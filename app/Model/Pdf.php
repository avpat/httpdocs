
<?php

class Pdf extends AppModel {

public $actsAs = array( 
	'Uploader.Attachment' => array(
		'fileName' => array(
			'name'		=> 'formatFileName',	// Name of the function to use to format filenames
			'baseDir'	=> '',			// See UploaderComponent::$baseDir
			'uploadDir'	=> '',			// See UploaderComponent::$uploadDir
			'dbColumn'	=> 'uploadPath',	// The database column name to save the path to
			'importFrom'	=> '',			// Path or URL to import file
			'defaultPath'	=> '',			// Default file path if no upload present
			'maxNameLength'	=> 30,			// Max file name length
			'overwrite'	=> true,		// Overwrite file with same name if it exists
			'stopSave'	=> true,		// Stop the model save() if upload fails
			'allowEmpty'	=> true,		// Allow an empty file upload to continue
			'transforms'	=> array(),		// What transformations to do on images: scale, resize, etc
			's3'		=> array(),		// Array of Amazon S3 settings
			'metaColumns'	=> array(		// Mapping of meta data to database fields
				'ext' => '',
				'type' => '',
				'size' => '',
				'group' => '',
				'width' => '',
				'height' => '',
				'filesize' => ''
			)
		)
	)
);
}

?>