 <?php 
 
 function IFilesExists($url){
  $headers = @get_headers($url, 1);
  if ($headers[0]=='') return false;
  return !((preg_match('/404/', $headers[0]))==1);

}
var_dump(IFilesExists($url));



  function flash(){
    if(isset($_SESSION['flash'])){
        echo $_SESSION['flash'];
    }
    unset($_SESSION['flash']);
 
}





















