<?php
                        session_start();

                        if ($_SESSION['level'] === 'admin') { header("location:admin/index.php");}
                        else{header("location:index.php");
                        }?>
