<?php

App::uses('File', 'Utility');

class FileBehavior extends ModelBehavior {
	
	public $fileData;
	
	private $path;
	
	public function setup(Model $Model, $settings = array()) {
		if(empty($settings)) {
			$this->settings[$Model->alias] = array(
				'file_data' => 'file',
				'path' => 'files',
				'name' => 'filename',
				//'size' => 'filesize',
				//'type' => 'mime',
				'required' => true
			);
		} else {
			$this->settings[$Model->alias] = array_merge($this->settings[$Model->alias], (array)$settings);
		}
	}


	public function beforeValidate(&$Model) {
		$this->fileData = $Model->data[$Model->alias][$this->settings[$Model->alias]['file_data']];
		if($Model->data[$Model->alias]['action'] == 'add' && $this->fileData['error'] == 4) {
			$Model->invalidate('file', 'Please upload a file');
			return false;
		}
		return true;
	}
	
	public function beforeSave(&$Model, $created) {
		if($this->fileData['error'] == 4) {
			return true;
		}
		
		$path = ROOT.DS.$this->settings[$Model->alias]['path'].DS;
		
		$filename = preg_replace("/(?:[^\w\.-]+)/", "_", $this->fileData['name']);

		if(file_exists($path.$filename)) {
			// file data
			$file = new File($filename);
			$name = $file->name();
			$ext = $file->ext();
			$file->close();
			// find dupes from database
			$i = $Model->find('count', array('conditions' => array('filename LIKE' => "%{$name}%")));
			// new filename
			$filename = "{$name}-{$i}.{$ext}";
		}
		
		// get temp file
		$file = new File($this->fileData['tmp_name']);
		if($file->size() > 0) {
			$data = $file->read();
			$file->close();
			// put file
			$file = new File($path.$filename);
			$file->write($data);
		} else {
			$Model->invalidate('file', 'File size is zero, please try again');
			return false;
		}
		$file->close();
		
		$Model->data[$Model->alias] = array_merge($Model->data[$Model->alias], array(
			'filename' => DS.$this->settings[$Model->alias]['path'].DS.$filename,
			'filesize' => $this->fileData['size'],
			'filetype' => $this->fileData['type'],
		));
		//pr($Model->data);
		return true;
	}
	
	public function beforeDelete(&$Model) {
		$data = $Model->read();
		$this->path = ROOT . $data[$Model->alias][$this->settings[$Model->alias]['name']];
		return true;
	}

	public function afterDelete(&$Model) {
		if($this->path) {
			$file = new File($this->path);
			$file->delete();
			$file->close();
		}
		return true;
	}

}