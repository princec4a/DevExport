<?php
/**
 * Created by JetBrains PhpStorm.
 * User: desty
 * Date: 12/11/13
 * Time: 15:11
 * To change this template use File | Settings | File Templates.
 */


class GestionFichier{

    static function typeFichier($filename) {
        preg_match("|\.([a-z0-9]{2,4})$|i", $filename, $fileSuffix);

        switch(strtolower($fileSuffix[1]))
        {
            case "js" :
                return "application/x-javascript";

            case "json" :
                return "application/json";

            case "jpg" :
            case "jpeg" :
            case "jpe" :
                return "images/extentions/image.png";

            case "png" :
            case "gif" :
            case "bmp" :
            case "tiff" :
                return "images/extentions/image.png";

            case "css" :
                return "text/css";

            case "xml" :
                return "application/xml";

            case "doc" :
            case "docx" :
                return "images/extentions/word.png";

            case "xls" :
            case "xlsx" :
            case "xlt" :
            case "xlm" :
            case "xld" :
            case "xla" :
            case "xlc" :
            case "xlw" :
            case "xll" :
                return "images/extentions/excel.png";

            case "ppt" :
            case "pps" :
                return "images/extentions/powerpoint.png";

            case "rtf" :
                return "application/rtf";

            case "pdf" :
                return "images/extentions/pdf.png";

            case "html" :
            case "htm" :
            case "php" :
                return "text/html";

            case "txt" :
                return "text/plain";

            case "mpeg" :
            case "mpg" :
            case "mpe" :
                return "video/mpeg";

            case "mp3" :
                return "audio/mpeg3";

            case "wav" :
                return "audio/wav";

            case "aiff" :
            case "aif" :
                return "audio/aiff";

            case "avi" :
                return "video/msvideo";

            case "wmv" :
                return "video/x-ms-wmv";

            case "mov" :
                return "video/quicktime";

            case "zip" :
                return "application/zip";

            case "tar" :
                return "application/x-tar";

            case "swf" :
                return "application/x-shockwave-flash";

            default :
                if(function_exists("mime_content_type"))
                {
                    $fileSuffix = mime_content_type($filename);
                }

                return "unknown/" . trim($fileSuffix[0], ".");
        }
    }


    static function stripAccents($string)
    {
        $string = utf8_decode($string);
        $from = utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ');
        $to = 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY';
        return strtr($string,$from,$to);
    }

    /***************************************************************************/
    /**
     * Traitement des fichiers  du dossier
     */

    static  function FileSaveFichier($Fichiers,$id,$id_dossier,$dir=null)
    {
        if (isset($Fichiers) && count($Fichiers) > 0)
        {
            $old = umask(0);
            foreach ($Fichiers as $file => $Fichier) {
                $file_name = $Fichier->name;
                $chemin =  Client::model()->getPathFiles($id,$id_dossier,$dir);
                if (is_dir($chemin)) {
                    $Fichier->saveAs($chemin.'/'.$Fichier->name);
                }
                else
                {   mkdir($chemin, 0755, true);
                    $Fichier->saveAs($chemin.'/'.$Fichier->name);

                }
            }
            umask($old);
            return $file_name;
        }   //doing nothing
    }


    static  function EtablissementReadFichier($id)
    {
        $chemin =  Etablissement::model()->getPathFiles($id); //Adresse du dossier sans oublier le / à la fin.

        if (is_dir($chemin))
        {
            $ch = explode(Yii::getPathOfAlias('webroot'),$chemin);
            $url = $ch[1];
            $dossier=Opendir($chemin);
            $i=0;
            echo'<ul>';

            //Ouverture du dossier.
            while ($Fichier = readdir($dossier)) //On affiche les fichiers les uns après les autres.
            {
                //Maintenant, on affiche les fichiers sous forme de liens vers les fichiers
                //(NB : Les lien sont en target="_blank" ce qui signifie qu'ils ouvrirons une nouvelle page dans votre navigateur !).

                if ($Fichier != "." && $Fichier != "..") // Filtre antipoint !<br/>
                {
                    echo'<script type="text/javascript">
                             <!--
                              function confirmation'.$i.'() {
                                var answer = confirm("Êtes-vous sûr de vouloir supprimer '.$Fichier.' ?")
                                  if (answer){
                                    window.location = "'.Yii::app()->request->baseUrl.'/index.php/taxmanager/etablissement/update/id/'.$id.'/deletefile/'.$Fichier.'"
                                  }

                              }
                              //-->
                          </script>
 ';
                    // C'est juste en dessous qu'il y a eu les modifications. <br/>

                    echo '
                   <li class="fichiericon">
                    <a  href="'.Yii::app()->request->baseUrl.''.utf8_encode($url).''.$Fichier.'" target="_blank">
                        <img width="60" src="'.Yii::app()->request->baseUrl.''.utf8_encode($url).''.$Fichier.'" title="'.$Fichier.'"></a>
                    <a onclick="confirmation'.$i.'()"><img src="'.Yii::app()->request->baseUrl.'/images/ndone.jpg" title="Supprimer '.$Fichier.'" class="tooltip"></a>
                   </li>';
                    $i=$i+1;
                }
            }
            if($i>=1){

                //zipper::zippe('Operation_'.$id.'_'.$date.'.zip',$chemin,$chemin);
                echo'<li> </li>';}
            echo'</ul>';
            closedir($dossier);
        }
        else{
            echo '<p>Aucun fichier n\' a été attaché à cette opération !</p>';
        }

    }

    static function EtablissementDeleteFichier($id,$deleteFichier,$dir=null)
    {
        if(isset($dir) && !empty($dir))
            $chemin =  Etablissement::getPathFiles($id,$dir);//Adresse du dossier sans oublier le / à la fin.
        else
            $chemin =  Etablissement::getPathFiles($id);//Adresse du dossier sans oublier le / à la fin.

        if (is_dir($chemin)) {

            $dossier=Opendir($chemin);

            while ($Fichier = readdir($dossier)) //On affiche les fichiers les uns après les autres.
            {
                //Maintenant, on affiche les fichiers sous forme de liens vers les fichiers
                //(NB : Les lien sont en target="_blank" ce qui signifie qu'ils ouvrirons une nouvelle page dans votre navigateur !).

                if($Fichier == $deleteFichier) {
                    unlink($chemin.'/'.$Fichier)  ;
                }

            }

            closedir($dossier);
        }
        else
        {echo '<p>Aucun fichier n\' a été attaché à cette opération !</p>';}

    }

    function GestionFichier()
    {
        //doing nothing
    }
    function getFileExt($originalFileName)
    {
        //return strtolower(substr(strrchr($this->fileName, "."), 1));
        return substr(strrchr($originalFileName, "."), 1);
    }
    function createFileName ($originalFileName,$fileName){
        return $fileName.'.'.$this->getFileExt($originalFileName);
    }
    public function savefiles($path,$name_attribut='fichier',$name=NULL ) {

        if(isset($_FILES[$name_attribut]))
        {
            // delete old files
            //foreach($this->findFiles() as $filename)
            //unlink(Yii::app()->params['uploadDir'].$filename);
            $old = umask(0);
            $folder =$path;// $path.$id.DIRECTORY_SEPARATOR;
            if(!is_dir($folder)){
                mkdir($folder, 0755, true);
            }
            umask($old);
            //upload new files
            foreach($_FILES[$name_attribut]['name'] as $key=>$filename) {
                $filename = ($name !=NULL)?$this->createFileName($filename, $name):$filename;
                // var_dump($filename);
                move_uploaded_file($_FILES[$name_attribut]['tmp_name'][$key],$folder.$filename);
            }
        }
        //var_dump($_FILES);exit;


    }
    public function saveModelfiles($path,$model_name,$name_attribut='fichier',$name=NULL ) {
        // var_dump(isset($_FILES[$model_name]));exit;
        if(isset($_FILES[$model_name]))
        {
            // delete old files
            //foreach($this->findFiles() as $filename)
            //unlink(Yii::app()->params['uploadDir'].$filename);
            $folder =$path;// $path.$id.DIRECTORY_SEPARATOR;
            if(!is_dir($folder)){
                mkdir($folder, 0755, true);
            }
            //upload new files
            foreach($_FILES[$model_name]['name'] as $key_attr=>$filenames) {

                if($key_attr == $name_attribut) {
                    if(!is_array($filenames)) {
                        $filename = ($name !=NULL)?$this->createFileName($filenames, $name):$filenames;
                        //var_dump($_FILES[$model_name]['tmp_name'][$name_attribut]);exit;
                        move_uploaded_file($_FILES[$model_name]['tmp_name'][$name_attribut],$folder.$filename);

                    } else {
                        foreach($filenames as $key=>$filename) {
                            $filename = ($name !=NULL)?$this->createFileName($filename, $name):$filename;
                            // var_dump($_FILES[$model_name]['tmp_name'][$name_attribut][$key]);
                            move_uploaded_file($_FILES[$model_name]['tmp_name'][$name_attribut][$key],$folder.$filename);
                        }

                    }
                    /* foreach($filenames as $filename) {
                         $filename = ($name !=NULL)?$this->createFileName($filename, $name):$filename;
                     // var_dump($filename);
                         move_uploaded_file($_FILES[$model_name]['tmp_name'][$name_attribut][$key],$folder.$filename);
                     }*/
                }
            }
        }
    }
    public function findFiles($path) {
        if ( is_dir($path)) {
            return array_diff(scandir($path), array('.', '..'));
        }else {
            return  array();
        }
    }
    public function getFileByName1($name,$path) {
        $arrFiles = array();
        $files = $this->findFiles($path);
        foreach ($files as $file ) {
            $fileInfos = pathinfo($path.DIRECTORY_SEPARATOR.$file);
            if($fileInfos['filename'] == $name) {
                $arrFiles[]= $file;
            }

        }
        return $arrFiles;
    }
    public function getFileByName($name,$path) {
        $files = $this->findFiles($path);
        foreach ($files as $file ) {
            $fileInfos = pathinfo($path.DIRECTORY_SEPARATOR.$file);
            if($fileInfos['filename'] == $name) {
                return  $file;
            }

        }
    }
    public static function deleteFilesByDir($path){
        $files = GestionFichier::findFiles($path);
        foreach ($files as $file ) {
            unlink($path.DIRECTORY_SEPARATOR.$file)  ;
        }
    }
    public static function deleteFileByName($path,$name) {
        $files = GestionFichier::findFiles($path);
        foreach ($files as $file ) {
            $fileInfos = pathinfo($path.DIRECTORY_SEPARATOR.$file);
            if($fileInfos['filename'] == $name) {
                unlink($path.DIRECTORY_SEPARATOR.$file)  ;
            }

        }

    }
}
?>