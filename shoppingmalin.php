<?php
/*
Plugin Name: ShoppingMalin
Description: Cette extension vous permet d'installer le comparateur de prix ShoppingMalin dans votre site. Apr&egrave;s activation cliquez sur le lien "R&eacute;glages" !!
Version: 1.0
Author: Multiclic
Author URI: http://www.ShoppingMalin.com
License: GPLv2 or later
*/

if ( ! defined('ABSPATH') ) exit; // Exit if accessed directly

define( 'SHOPPINGMALIN_URL', plugin_dir_url ( __FILE__ ) );
define( 'SHOPPINGMALIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SHOPPINGMALIN_VERSION', "1.0" );

// Charger la feuille de style & javascript
// https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
add_action( 'admin_enqueue_scripts', 'shoppingmalin_fonction_jscss' );
function shoppingmalin_fonction_jscss($hook) {
  // On ne va charger ca que pour l'admin de shoppingmalin
   if ( 'settings_page_shoppingmalin' != $hook ) {
        return;
    }
  // Inscription / Activation
  wp_register_style( 'ShoppingMalinStyle', SHOPPINGMALIN_URL.'style.css' );
  wp_enqueue_style( 'ShoppingMalinStyle' );
  // Onglets
  wp_register_style( 'ShoppingMalinStyleOnglet', SHOPPINGMALIN_URL.'onglet/style.css' );
  wp_enqueue_style( 'ShoppingMalinStyleOnglet' );
  wp_register_script( 'ShoppingMalinScriptOnglet', SHOPPINGMALIN_URL."onglet/modernizr.custom.04022.js" );
  wp_enqueue_script( 'ShoppingMalinScriptOnglet' );
  // ZeroClipBoard
  wp_register_script( 'ShoppingMalinScriptZero', SHOPPINGMALIN_URL."zeroclipboard/ZeroClipboard.js" );
  wp_enqueue_script( 'ShoppingMalinScriptZero' );
}


// Ajoute un lien dans le menu Reglages
add_action( 'admin_menu', 'shoppingmalin_fonction_menu' );
function shoppingmalin_fonction_menu() {
  add_options_page(
      'ShoppingMalin',       // Le texte utilise dans la balise title
      'ShoppingMalin',       // le texte utilise pour le libelle du menu dans "Reglage"
      'manage_options',      // La capacite requise pour ce menu a afficher a l'utilisateur.
      'shoppingmalin',       // Le texte utilise dans l'URL (slug)
      'shoppingmalin_fonction_config' // Le nom de la fonction a appeler pour afficher la page
  );
}

// Ajouter des liens a droite ou a gauche de Activer / Desactiver
// http://www.geekpress.fr/wordpress/tutoriel/ajouter-reglages-plugins-1154/
add_filter( 'plugin_action_links_'.plugin_basename( __FILE__ ), 'shoppingmalin_fonction_liens', 10, 2 );
function shoppingmalin_fonction_liens( $links, $file ) {
    // Lien vers la page de config de ce plugin
    array_unshift( $links, '<a href="' . admin_url( 'admin.php?page=shoppingmalin' ) . '">' . __( 'Settings' ) . '</a>' );
    return $links;
}

// Affichage de la page reglages
function shoppingmalin_fonction_config(){
  $ShoppingMalin_CodeActivation = get_option( "shoppingmalin_codeactivation" );
  if ( $ShoppingMalin_CodeActivation !== false )
   {
    // S'il est enregistre affichage de la page parametre
    echo "<div style='clear: both;'></div>";
    include SHOPPINGMALIN_DIR."config.php";
    // Chargement des infos qu'il a deja configure
    ?>
    <script>
      jQuery(document).ready(function($) {
       $.ajax({
            type: 'GET',
            url: 'http://www.shoppingmalin.com/iframe/chargement.php?CodeActivation=<?php echo $ShoppingMalin_CodeActivation; ?>',
            timeout: 10000,
            success: function(data) {

              var TabData=data.split("\&");
              for (var i=0; i<TabData.length; i++) {

                var infos=TabData[i].split("=");
                var key = infos[0];
                var val = infos[1];

                if (key.substring(0,14)=="TabAffiliation")
                  document.getElementById(key).value=val;
                else
                  shoppingmalin_fonction_pos_select(key, val);

              }

              // Chargement termine, alors afficher les onglets
              document.getElementById('shoppingmalin_chargement').style.display='none';
              document.getElementById('tabs').style.display='block';

              },
            error: function() {
              alert('Chargement des infos impossible. R\351\351ssayez plus tard.'); }
          });   
      });


      function shoppingmalin_fonction_pos_select(Source, Find) {
          var sel = document.getElementById(Source);
          for(var i = 0, j = sel.options.length; i < j; ++i) {
              if(sel.options[i].innerHTML === Find) {
                 sel.selectedIndex = i;
                 break;
              }
          }
      }
    </script>
    <?php
   }
  else
   {
    echo "<div style='clear: both;'></div>";
    // S'il n'est pas enregistre affichage d'inscription
    echo '<img src="'.SHOPPINGMALIN_URL.'img/entete.png" width="590">';
    echo '<div class="shoppingmalin_ia">';
      echo '<p>Cette extension vous permet d\'installer un comparateur de prix o&ugrave; vous voulez sur votre site.</p><br>';
      // box inscription
      echo '<div class="shoppingmalin_inscription">';
        echo '<div class="shoppingmalin_ia_description">';
          echo '<strong>Activer ShoppingMalin</strong>';
          echo '<p>Inscrivez-vous gratuitement. Un code d\'activation vous sera envoy&eacute; par email.</p>';
        echo '</div>';
        echo '<form name="Form1SM" id="Form1SM" action="http://www.shoppingmalin.com/iframe/inscription.php" method="POST" class="shoppingmalin_right">';
          echo 'Votre email : <input type="text" name="AdresseEmail" id="AdresseEmail" class="shoppingmalin_ia_input">';
          echo '<input type="hidden" name="URLBlog" value="'.esc_url( get_bloginfo('url') ).'">';
          echo '<input type="hidden" name="URLDossierPlugin" value="'.esc_url( plugin_dir_url( __FILE__ ) ).'">';
          echo '<input type="hidden" name="VersionPlugin" value="'.SHOPPINGMALIN_VERSION.'">';
          echo '<input type="submit" class="right button button-primary" value="Obtenir votre code"/>';
        echo '</form>';
      echo '</div>';
      // box activation
      echo '<div class="shoppingmalin_activation">';
        echo '<div class="shoppingmalin_ia_description">';
          echo '<strong>Saisissez votre code</strong>';
          echo '<p>Si vous connaissez d&eacute;j&agrave; votre code d\'activation.</p>';
        echo '</div>';
        echo '<form name="Form2SM" id="Form2SM" action="http://www.shoppingmalin.com/iframe/activation.php" method="post" class="shoppingmalin_right">';
          echo 'Votre code : <input type="text" id="CodeActivation" name="CodeActivation" value="" class="shoppingmalin_ia_input">';
          echo '<input type="submit" class="right button button-secondary" value="Utiliser ce code"/>';
        echo '</form>';
      echo '</div>';
    echo '</div>';
    echo 'Besoin d\'aide ? Contactez-nous <A HREF="http://www.ShoppingMalin.com" target="_blank">http://www.ShoppingMalin.com</A>';
   }
}

// Traitement des formulaires en ajax
add_action( 'admin_footer-settings_page_shoppingmalin', 'shoppingmalin_fonction_formulaires1' );
function shoppingmalin_fonction_formulaires1() {

  $ShoppingMalin_CodeActivation = get_option( "shoppingmalin_codeactivation" );
  ?>
  <script type="text/javascript" >
    jQuery(document).ready(function($) {
      jQuery('#Form1SM').on('submit', function(e) {
        e.preventDefault();  // J'empeche le comportement par defaut du navigateur
        var $this = $(this); // L'objet jQuery du formulaire
 
        // Je recupere les valeurs
        var mail = $('#AdresseEmail').val();

        // Je verifie une premiere fois pour ne pas lancer la requete HTTP

        var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

        if(mail === '') {
          alert('Veuillez indiquer votre adresse email.');
        }
        else if (reg.test(mail)==false) {
          alert('Votre adresse email semble invalide.');
        } else {
          // Envoi de la requete HTTP en mode asynchrone
          $.ajax({
            url: $this.attr('action'), // Le nom du fichier indique dans le formulaire
            type: $this.attr('method'), // La methode indiquee dans le formulaire (get ou post)
            data: $this.serialize(), // Je serialise les donnees (j'envoie toutes les valeurs presentes dans le formulaire)
            success: function(html) { // Je recupere la reponse du fichier PHP
              alert(html); // J'affiche cette reponse
            }
          });
        }
      });
    });

    jQuery(document).ready(function($) {
      jQuery('#Form2SM').on('submit', function(e) {
        e.preventDefault(); // J'empeche le comportement par defaut du navigateur
        var $this = $(this); // L'objet jQuery du formulaire
 
        // Je recupere les valeurs
        var code = $('#CodeActivation').val();

        // Je verifie une premiere fois pour ne pas lancer la requete HTTP
        if(code === '') {
          alert('Veuillez indiquer votre code d\'activation.');
        } else {
          // Envoi de la requete HTTP en mode asynchrone
          $.ajax({
            url: $this.attr('action'), // Le nom du fichier indique dans le formulaire
            type: $this.attr('method'), // La methode indiquee dans le formulaire (get ou post)
            data: $this.serialize(), // Je serialise les donnees (j'envoie toutes les valeurs presentes dans le formulaire)
            success: function(html) { // Je recupere la reponse du fichier PHP
              // alert(html); // J'affiche cette reponse recu depuis activation.php
              if (html=="OK") {
                 //////////////// SI activation.php = OK //////////////////////
                 var data = {
                   action: 'shoppingmalin_fonction_sauvegarde_option',
                   my_var: code
                 };

                 jQuery.post( ajaxurl, data, function(response) {
                   // handle response from the AJAX request.
                   // alert(response); // recu depuis la fonction plus bas
                   window.location.reload();
                 });
                 //////////////////////////////////////////////////////////////
              }
              else {
                 alert(html);   // Message code activation invalide recu depuis activation.php
              }
            }
          });
        }
      });
    });
  </script>
  <?php
}

// Enregistrement du CodeActivation dans la table wp_options
add_action( 'wp_ajax_shoppingmalin_fonction_sauvegarde_option', 'shoppingmalin_fonction_sauvegarde_option' );
function shoppingmalin_fonction_sauvegarde_option() {
  $option_name = 'shoppingmalin_codeactivation';
  $new_value = trim($_POST['my_var']);

  if ( get_option( $option_name ) !== false ) {
      // L'option existe, faire qu'une mise a jour
      update_option( $option_name, $new_value );
  } else {
      // L'option n'existe pas, l'ajouter
      $deprecated = null;
      $autoload = 'no';
      add_option( $option_name, $new_value, $deprecated, $autoload );
  }

  // echo "Ma reponse"; // Juste avant window.location.reload();
  die();
}

// Creation des Shortcodes
// https://codex.wordpress.org/Function_Reference/add_shortcode
add_shortcode('shoppingmalin', 'shoppingmalin_fonction_shortcode');
function shoppingmalin_fonction_shortcode($atts) {
  $option_name = 'shoppingmalin_codeactivation';
  $CodeActivation = get_option( $option_name );
  $TabCA = explode("-", $CodeActivation);
  $IDIFrame = $TabCA[0];

  $Param = shortcode_atts(
    array(
      'top' => '',
      'ref' => '',
    ), $atts, 'shoppingmalin' );

  // Les 3 types d'iframes
  if ($Param['top']=="1") {

    // IFrame 3 - Meilleur prix
    $Param3 = shortcode_atts(
      array(
        'cat' => '',
        'ref' => '',
        'frameborder' => '0',
        'scrolling' => 'no',
        'width' => '100',
        'height' => '77',
      ), $atts, 'shoppingmalin' );

    return '<iframe class="shoppingmalin_iframe3" src="http://www.shoppingmalin.com/iframe/iframe3.php?IDF='.$IDIFrame.'&cat='.$Param3["cat"].'&ref='.$Param3["ref"].'" width="' . $Param3['width'] . '" height="' . $Param3['height'] . '" scrolling="' . $Param3['scrolling'] . '" frameborder="' . $Param3['frameborder'] . '"></iframe>';
  }
  elseif ($Param['ref']!="") {

    // IFrame 2 - Reference specifique
    $Param2 = shortcode_atts(
      array(
        'cat' => '',
        'ref' => '',
        'frameborder' => '0',
        'scrolling' => 'auto',
        'width' => '450',
        'height' => '400',
      ), $atts, 'shoppingmalin' );

    return '<iframe class="shoppingmalin_iframe2" src="http://www.shoppingmalin.com/iframe/iframe2.php?IDF='.$IDIFrame.'&cat='.$Param2["cat"].'&ref='.$Param2["ref"].'" width="' . $Param2['width'] . '" height="' . $Param2['height'] . '" scrolling="' . $Param2['scrolling'] . '" frameborder="' . $Param2['frameborder'] . '"></iframe>';
  }
  else {

    // IFrame 1 - Comparateur
    $Param1 = shortcode_atts(
      array(
        'frameborder' => '0',
        'scrolling' => 'auto',
        'width' => '100%',
        'height' => '1560',
      ), $atts, 'shoppingmalin' );

    return '<iframe class="shoppingmalin_iframe1" src="http://www.shoppingmalin.com/iframe/iframe1.php?IDF='.$IDIFrame.'" width="' . $Param1['width'] . '" height="' . $Param1['height'] . '" scrolling="' . $Param1['scrolling'] . '" frameborder="' . $Param1['frameborder'] . '"></iframe>';
  }
}

// Si deinstallation alors supprimer l'enregistrement que l'on a mis dans la base
register_uninstall_hook(__FILE__, 'shoppingmalin_fonction_uninstall');
function shoppingmalin_fonction_uninstall() {
  delete_option( 'shoppingmalin_codeactivation' );
}

?>