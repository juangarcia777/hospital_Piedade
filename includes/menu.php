
<div class="menu">

<ul>
    <a href="<?php echo $root_doc; ?>"><li style="margin-left:20px">HOME</li></a>

    
    <li id="menu01">
        O HOSPITAL&nbsp;<i class="fa fa-angle-down fa-fw" aria-hidden="true"></i>
        <div class="sub01" style="height: auto;">
            <a href="<?php echo $root_doc; ?>diretoria" class="submenu">DIRETORIA</a>
            <a href="<?php echo $root_doc; ?>estrutura-hospital" class="submenu">ESTRUTURA</a>
            <a href="<?php echo $root_doc; ?>hospital" class="submenu">HISTÓRIA</a>
            <a href="<?php echo $root_doc; ?>missao-visao-valores" class="submenu">MISSÃO, VISÃO E VALORES</a>

             <div id="menu99" class="submenu">TRANSPARENCIA<i class="fa fa-angle-right fa-fw poy" aria-hidden="true"></i>
             
                 <div class="subsub">
                    <a href="<?php echo $root_doc; ?>documentos-probatorios" class="submenu2">DOCUMENTOS PROBAT?IOS</a>    
                    <a href="<?php echo $root_doc; ?>fomento-2018" class="submenu2">TERMO DE FOMENTO 2018</a>   
                    <a href="<?php echo $root_doc; ?>fomento-2019" class="submenu2">TERMO DE FOMENTO 2019</a>       
                    <a href="<?php echo $root_doc; ?>recursos-humanos" class="submenu2" style="background-color: #23D5AE;" >RECURSOS HUMANOS</a>        
                 
                 </div>
             
            </div>
        </div>
    </li>
    
    <li id="menu02">
        SERVIÇOS&nbsp;<i class="fa fa-angle-down fa-fw" aria-hidden="true"></i>
        <div class="sub02">
            <?php
                $db = new DB();
                $sql = $db->select("SELECT * FROM servicos ORDER BY titulo");
                while($row = $db->expand($sql)){
                    
                    $id_serv = $row['id'];
                    //if($row['id']==4){
                        
                    //  echo '<div id="menu99" class="submenu">'.$row['titulo'].'<i class="fa fa-angle-right fa-fw poy" aria-hidden="true"></i>';
                        
                        //  echo '<div class="subsub">';
                                
            //                  $sql2 = $db->select("SELECT * FROM subservicos WHERE id_servico='$id_serv' ORDER BY titulo");
                //              while($row2 = $db->expand($sql2)){  
                    //              echo '<a href="'.$root_doc.'subservicos/'.normaliza($row2['titulo'],$row2['id']).'" class="submenu2">'.$row2['titulo'].'</a>';  
                        //      }
                                
                            //echo '</div>';
                        
                    //  echo '</div>';  
                            
                    //} else {
                    
                    echo '<a href="'.$root_doc.'servicos/'.normaliza($row['titulo'],$row['id']).'" class="submenu">'.$row['titulo'].'</a>'; 
                    
                    //}
                }
            ?>                    
        </div>
    </li>
    
    <li id="menu03">
        MATERNIDADE&nbsp;<i class="fa fa-angle-down fa-fw" aria-hidden="true"></i>
        <div class="sub03">
            <a href="<?php echo $root_doc; ?>bercario" class="submenu">BERÇARIO VIRTUAL</a>
            <a href="<?php echo $root_doc; ?>estrutura" class="submenu">ESTRUTURA</a>
            
            <a href="<?php echo $root_doc; ?>horarios" class="submenu">HORÁRIO DE VISITAS</a>
        </div>
    </li>
    
    
    <li id="menu04">
        CORPO CLINICO&nbsp;<i class="fa fa-angle-down fa-fw" aria-hidden="true"></i>
        <div class="sub04">
            <a href="<?php echo $root_doc; ?>especialidades" class="submenu">ESPECIALIDADES</a>
        </div>
    </li>
    
    <a href="<?php echo $root_doc; ?>noticias" style="display:none"><li>NOTICIAS</li></a>
    
    <li id="menu05">
        PROJETOS&nbsp;<i class="fa fa-angle-down fa-fw" aria-hidden="true"></i>
        <div class="sub05">
            <a href="<?php echo $root_doc; ?>projeto" class="submenu">PROJETO EMPRESA AMIGA</a>
        </div>
    </li>
    
    <a href="<?php echo $root_doc; ?>doacoes"><li>DOAÇÕES</li></a>
    
    <a href="<?php echo $root_doc; ?>ouvidoria" style="display:none"><li>OUVIDORA</li></a>
    
    <a href="<?php echo $root_doc; ?>contato"><li>CONTATO</li></a>
    
</ul>

</div>