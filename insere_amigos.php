<?php
require ("class/class.db.php");
require ("class/class.seguranca.php");


$pasta = 'logos_loop/';

						if(is_dir($pasta)){
							$diretorio = dir($pasta);
							$x=1;
							while($arquivo = $diretorio->read()){
								
								if($arquivo != '..' && $arquivo != '.'){
									
									$sql = $db->select("INSERT INTO parceiros (ordem, foto) VALUES ('$x', '$arquivo')");
									$x++;	
								}
							}
							$diretorio->close();
						}

						

?>