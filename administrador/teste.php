<?php
include '../conexao.php';

$curso=24;
                                      if (isset($_POST['excluirModulo'])) {
                                          $id5=$_POST['excluirModulo'];




                                          $sql5="select COUNT(A.id_curso) from tb_pessoacurso1 A, tb_curso1 B, tb_modulo1 C WHERE A.id_curso=B.id_curso AND B.id_curso=C.id_curso and C.id_curso='$curso'";
                                           $x=mysqli_query($conexao,$sql5);
                                           $cont=mysqli_num_rows($x);
                                           if ($cont==0) {
                                              echo "0";
                                           }else {
                                            echo "tem aluno";
                                           }




                                      }
 ?>
