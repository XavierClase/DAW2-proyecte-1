<?php
    include_once 'models/Usuari.php';
    include_once 'models/UsuariDao.php';
    include_once 'controllers/sessioController.php';

    class autenticacioController {
        
        public function registre() {
            include_once 'views/registre.php';
        }

        public function login() {
            include_once 'views/login.php';
        }

        public function createUsuari() {

            $nom = $_POST['nom'];
            $cognoms = $_POST['cognoms'];
            $correu = $_POST['correu'];
            $contra = $_POST['contrasenya'];
            $confirmarContrasenya = $_POST['confirmar-contrasenya'];
            $telefon = $_POST['telefon'];
            $dataNaixement = $_POST['dataNaixement'];
        
            $usuariAutenticar = UsuariDao::getUsuaris($correu);
        
            if (count($usuariAutenticar) != 0) {
                $_SESSION['error_correu'] = 'El correu electrònic ja està registrat.';
                header('Location: ?controller=autenticacio&action=registre');
                exit;
            } else {
                if ($contra != $confirmarContrasenya) {
                    $_SESSION['error_contra'] = 'Les contrasenyes no coincideixen';
                    header('Location: ?controller=autenticacio&action=registre');
                    exit;
                } else {
                    $usuari = new Usuari();
                    $usuari->setNom($nom);
                    $usuari->setCognoms($cognoms);
                    $usuari->setCorreu_electronic($correu);
                    $usuari->setContrasenya($contra);
                    $usuari->setTelefon($telefon);
                    $usuari->setData_naixement($dataNaixement);
        
                    UsuariDao::registre($usuari);
        
                    header('Location:?controller=autenticacio&action=login');
                    exit;
                }
            }
        }
        

        public function loginUsuari() {
            $correu = $_POST['correuLogin'];
            $contra = $_POST['contrasenyaLogin'];

            $usuari = usuariDao::getUsuaris($correu);

            if (count($usuari) != 1) {
                $_SESSION['error_usuari'] = "L'usuari no existeix";
                header('Location:?controller=autenticacio&action=login');                
            } else {
                if ($usuari[0]->getContrasenya() != $contra) {
                    $_SESSION['error_contra'] = "Contrasenya incorrecta";
                    header('Location:?controller=autenticacio&action=login');         
                } else {
                    sessioController::iniciarSesio($usuari[0]);
                    header('Location: index.php');
                    exit; 
                }
            }
            
        }
    }
?>
