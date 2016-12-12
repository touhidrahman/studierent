<div class="col-xs-12">
		<div class="jumbotron jumbotron-fluid text-xs-center">
		  <div class="container">
			<?php 
                     $path ='properties/';                     
                     $filename= $image->path;
                     $userimage=$path.$filename;
                     $file = WWW_ROOT . 'img' . DS . 'properties' . DS .$filename;  
                     if(file_exists($file))
                     {
                     echo $this->Html->image($userimage, array('alt' => 'CakePHP'));    
                     }
                    else
                       echo $this->Html->image('boy.jpg', array('alt' => 'CakePHP'));
?>
                     
                          
			
		  </div>
		</div>
	</div>