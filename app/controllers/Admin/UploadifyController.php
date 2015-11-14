<?php
class Admin_UploadifyController extends Controller {
	private $fileTypes = array('jpg', 'jpeg', 'gif', 'png','apk','zip'); // File extensions
	private $targetFolder = '';//����ļ���Ŀ¼
	private $siteRoot = '';//��Ŀ¼

	public function __construct(){
		$this->siteRoot = "http://" . $_SERVER['HTTP_HOST'] . "/";
		$this->siteRoot = str_replace('admin','www',$this->siteRoot);
	}

	public function postUpload() {
		$this->targetFolder = isset($_POST['savePath']) ? 'uploads/' . $_POST['savePath'] : 'uploads';
		$_POST['yearMonth'] = isset($_POST['yearMonth']) ? $_POST['yearMonth'] : false;//Ŀ¼�Ƿ����·ݽ�������
		$_POST['delImgPath'] = isset($_POST['delImgPath']) ? $_POST['delImgPath'] : false;//�Ƿ���Ҫɾ��ԭ����ͼƬ
		if($_POST['delImgPath']){
			$_POST['delImgPath'] = str_replace($this->siteRoot,'',$_POST['delImgPath']);
			if(is_file($_POST['delImgPath'])) unlink($_POST['delImgPath']);
		}
		if ($_POST['yearMonth']) {
			$this->targetFolder .= '/' . date('Ym');
		}
		if (!empty($_FILES)) {
			$file_size = $_FILES['Filedata']["size"];// Validate the file size of 100m
			if (1024 * 1024 * 100 < $file_size) {
				echo json_encode(array('status' => 0, 'data' => $file_size));
				return;
			}
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			$extension = $fileParts['extension'];
			if (!is_dir($this->targetFolder)) mkdir($this->targetFolder, 0777, true);
			$targetFile = rtrim($this->targetFolder, '/') . '/' . uniqid() . '.' . $extension;
			if (in_array($extension, $this->fileTypes) && is_uploaded_file($tempFile)) {
				if (!move_uploaded_file($tempFile, $targetFile)) {
					copy($tempFile, $targetFile);
				}
				$targetFile = $this->siteRoot . $targetFile;
				$arr = array('status' => 1, 'data' => $targetFile);
				echo json_encode($arr);exit;
			} else {
				echo json_encode(array('status' => 0, 'data' => '��֧�ָ��ļ�����'));exit;
			}
		}
	}
}