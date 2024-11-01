
<?php if ( ! defined('ABSPATH') ) exit; // Exit if accessed directly ?>

<img src="<?php echo SHOPPINGMALIN_URL; ?>img/entete.png" width="590">
<br><br>

<section id='tabs' class="tabs">
  <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" onclick="hidehelp();" <?php if ($_POST['Modification']=="" or $_POST['Modification']==1) echo 'checked="checked"'; ?> />
  <label for="tab-1" class="tab-label-1">Comparateur<br>ShoppingMalin</label>
        
  <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" onclick="hidehelp();" <?php if ($_POST['Modification']==2) echo 'checked="checked"'; ?> />
  <label for="tab-2" class="tab-label-2">R&eacute;f&eacute;rence<br>sp&eacute;cifique</label>
        
  <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" onclick="hidehelp();" <?php if ($_POST['Modification']==3) echo 'checked="checked"'; ?> />
  <label for="tab-3" class="tab-label-3">Meilleur<br>prix</label>

  <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" onclick="hidehelp();" <?php if ($_POST['Modification']==4) echo 'checked="checked"'; ?> />
  <label for="tab-4" class="tab-label-4">Affiliation</label>

  <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" onclick="hidehelp();" />
  <label for="tab-5" class="tab-label-5">Version<br>premium</label>
            
  <div class="clear-shadow"></div>
            
  <div class="content">
     <?php
     ///////////////////////////////////////////////////////////////////////////
     /// 1er onglet ////////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////
     ?>

     <div class="content-1">
       <h2>Comparateur ShoppingMalin</h2>
       <font class='shoppingmalin_titre' style='line-height:20px'>Pour afficher le comparateur utilisez ce shortcode :&nbsp;&nbsp;[shoppingmalin]</font>&nbsp;&nbsp;&nbsp;
       <button id="shoppingmalin_copier_shortcode1" style="[shoppingmalin]" data-clipboard-text="[shoppingmalin]" title="Copier">Copier</button>
       <script>
         var client_shortcode1 = new ZeroClipboard( document.getElementById("shoppingmalin_copier_shortcode1") );
         client_shortcode1.on( "ready", function( readyEvent ) {
           // alert( "ZeroClipboard SWF is ready!" );
           client_shortcode1.on( "aftercopy", function( event ) {
             event.target.innerHTML = "Ok, copi&eacute;";
             setTimeout(function(){ event.target.innerHTML = "Copier"; }, 2000);
           } );
         } );
       </script>

       <br><br>
       Param&egrave;tres optionnels :  width / height / frameborder / scrolling&nbsp;&nbsp;
       <a href = "javascript:void(0)" onclick = "document.getElementById('help1').style.display='block';"><img src="<?php echo SHOPPINGMALIN_URL; ?>img/icon-help.png"></A><br>

       <br><br><br>
       <form name='Form1SM_Onglet' id='Form1SM_Onglet' class='FormSM_Onglet' action='http://www.shoppingmalin.com/iframe/validation-onglet1.php' method='POST'>
         <input type='hidden' name='Modification' value='1'>
         <input type='hidden' name='CodeActivation' value='<?php echo $ShoppingMalin_CodeActivation; ?>'>
         <?php
         echo "<table border=0 cellspacing=0 cellpadding=0 width='560' style='position: absolute; top: 182px;'>";
         echo "<tr><td colspan='3' height='35'><hr></td></tr>";
         echo "<tr>";
         echo "<td class='shoppingmalin_titre'>Logos des marchands</td>";
         echo "<td colspan='2'>";
           echo "<span style='width:210px; float:left;'>Espace horizontal entre 2 logos : </span>";
           echo "<Select name='EspHorizontal' id='EspHorizontal'>";
             for ($i=0;$i<51;$i++)
               {
                echo "<option value='".$i."' ";
                if ($i==$EspHorizontal)
                  echo " selected ";
                echo ">".$i."</option>";
               }
           echo "</Select> pixels&nbsp;&nbsp;";
           echo "<a href = \"javascript:void(0)\" onclick = \"document.getElementById('help2').style.display='block';\"><img src='".SHOPPINGMALIN_URL."img/icon-help.png'></A><br>";
           echo "<span style='width:210px; float:left;'>Espace vertical entre 2 logos : </span>";
           echo "<Select name='EspVertical' id='EspVertical'>";
             for ($i=55;$i<100;$i++)
               {
                echo "<option value='".$i."' ";
                if ($i==$EspVertical)
                  echo " selected ";
                echo ">".$i."</option>";
               }
           echo "</Select> pixels<br><br>";
         echo "</td>";
         echo "</tr>\r\n";

         ///////////////////////////////////////////////////////////////////////

         echo "<tr>";
         echo "<td class='shoppingmalin_titre'>Police</td>";
         echo "<td colspan='2'>";
           echo "<Select name='FontFamily1' id='FontFamily1'>";
             $FF = array ("Verdana", "Arial", "Georgia", "Helvetica", "Times New Roman", "Baskerville", "Comic Sans MS", "Helvetica", "Tahoma");
             foreach($FF as $key)
               {
                echo "<option value='".$key."' ";
                if ($key==$FontFamily1)
                  echo " selected ";
                echo ">".$key."</option>";
               }
           echo "</Select><br>";
         echo "</td>";
         echo "</tr>\r\n";

         echo "<tr>";
         echo "<td class='shoppingmalin_titre'>Taille de la police</td>";
         echo "<td colspan='2'>";
           echo "<Select name='FontSize1' id='FontSize1'>";
             for ($i=8;$i<21;$i++)
               {
                echo "<option value='".$i."' ";
                if ($i==$FontSize1)
                  echo " selected ";
                echo ">".$i."</option>";
               }
           echo "</Select> pixels<br><br>";
         echo "</td>";
         echo "</tr>\r\n";

         ///////////////////////////////////////////////////////////////////////

         echo "<tr>";
           echo "<td colspan='2' class='shoppingmalin_td12'><input type='submit' value='Enregistrer les modifications' class='button button-primary'>&nbsp;&nbsp;</td>";
           echo "<td class='shoppingmalin_td3'><span id='shoppingmalin_message1' class='shoppingmalin_message'><img src='".SHOPPINGMALIN_URL."img/coche-verte.gif?R=".RAND(0,1000)."'></span></td>";
         echo "</tr>";
         echo "</table>";
         echo "</form>";
         ?>
     </div>
     <?php
     ///////////////////////////////////////////////////////////////////////////
     /// 2eme onglet ///////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////
     ?>
     <div class="content-2">
        <h2>R&eacute;f&eacute;rence sp&eacute;cifique</h2>

        L'internaute n'aura pas &agrave; saisir une r&eacute;f&eacute;rence, c'est vous qui allez la choisir.
        Le shortcode n'affichera que les boutiques proposant cet article.<br><br>

        <form>

          <span class='shoppingmalin_titre' style='display: inline-block;'>Type de boutique</span>
          <select name='cat2' id='cat2' style='width:210px;'>
            <option value=''>Type de boutiques</option>
            <option value='4' >Electrom&eacute;nager</option>
            <option value='1' >Hifi - Photo - T&eacute;l&eacute;vision</option>
            <option value='2' >Informatique</option>
            <option value='6' >Jouets</option>
            <option value='8' >Outillage</option>
            <option value='3' >T&eacute;l&eacute;phonie</option>
          </select><br>

          <span class='shoppingmalin_titre' style='display: inline-block;'>R&eacute;f&eacute;rence article</span>
          <input type="text" name="ref2" id="ref2" style='width:210px;'><br>

          <span class='shoppingmalin_titre' style='display: inline-block;'>&nbsp;</span>
          <input type="submit" value="Afficher le shortcode" onclick="Shortcode2(cat2.value, ref2.value); return false;" class="button button-primary">

          <script>
            function Shortcode2(cat2, ref2) {
              ref2 = ref2.replace(/(['"])/g," ");    // enlever simple et double cote - /g : global, toutes les occurrences
              ref2 = ref2.replace(/\s+/g, " ");      // \s+ : espaces consecutifs
              ref2 = ref2.trim();                    // espaces debut et fin
              if (cat2=="")
                {
                 alert("S\351lectionnez un type de boutiques");
                 return false;
                }
              else if (ref2=="")
                {
                 alert("Saisissez la r\351f\351rence d'un article");
                 return false;
                }

              var shortcode2 = '[shoppingmalin cat=\''+cat2+'\' ref=\''+ref2+'\']';
              document.getElementById('Shortcode2').innerHTML = 'Voici votre shortcode :&nbsp;&nbsp;'+shortcode2+'&nbsp;&nbsp;&nbsp;';

              document.getElementById("shoppingmalin_copier_shortcode2").style.display='block';

              client_shortcode2.on( "copy", function (event) {
                   var clipboard = event.clipboardData;
                   clipboard.setData( "text/plain", shortcode2 );
              });

             }
           </script>

        </form>
        <br>
        <span id="Shortcode2" name="Shortcode2" style="line-height:20px;float:left;"></span>
        <button id="shoppingmalin_copier_shortcode2" style="display:none;float:left;" data-clipboard-text="" title="Copier">Copier</button>

        <script>
          var client_shortcode2 = new ZeroClipboard( document.getElementById("shoppingmalin_copier_shortcode2") );
          client_shortcode2.on( "ready", function( readyEvent ) {
            // alert( "ZeroClipboard SWF is ready!" );
            client_shortcode2.on( "aftercopy", function( event ) {
              event.target.innerHTML = "Ok, copi&eacute;";
              setTimeout(function(){ event.target.innerHTML = "Copier"; }, 2000);
            } );
          } );
        </script>

        <form name='Form2SM_Onglet' id='Form2SM_Onglet' class='FormSM_Onglet' action='http://www.shoppingmalin.com/iframe/validation-onglet2.php' method="POST">
          <input type='hidden' name='Modification' value='2'>
          <input type='hidden' name='CodeActivation' value='<?php echo $ShoppingMalin_CodeActivation; ?>'>
          <?php
          echo "<table border=0 cellspacing=0 cellpadding=0 width='560' style='position: absolute; top: 260px;'>";
          echo "<tr><td colspan='3' height='35'><hr></td></tr>";
          echo "<tr>";
          echo "<td class='shoppingmalin_titre'>Police</td>";
          echo "<td colspan='2'>";
            echo "<Select name='FontFamily2' id='FontFamily2'>";
              $FF = array ("Verdana", "Arial", "Georgia", "Helvetica", "Times New Roman", "Baskerville", "Comic Sans MS", "Helvetica", "Tahoma");
              foreach($FF as $key)
                {
                 echo "<option value='".$key."' ";
                 if ($key==$FontFamily2)
                   echo " selected ";
                 echo ">".$key."</option>";
                }
            echo "</Select><br>";
          echo "</td>";
          echo "</tr>\r\n";

          echo "<tr>";
          echo "<td class='shoppingmalin_titre'>Taille de la police</td>";
          echo "<td colspan='2'>";
            echo "<Select name='FontSize2' id='FontSize2'>";
              for ($i=8;$i<21;$i++)
                {
                 echo "<option value='".$i."' ";
                 if ($i==$FontSize2)
                   echo " selected ";
                 echo ">".$i."</option>";
                }
            echo "</Select> pixels";
          echo "</td>";
          echo "</tr>\r\n";

          //////////////////////////////////////////////////////////////////////

          echo "<tr><td colspan='3'><br></td></tr>";
          echo "<tr>";
            echo "<td colspan='2' class='shoppingmalin_td12'><input type='submit' value='Enregistrer les modifications' class='button button-primary'>&nbsp;&nbsp;</td>";
            echo "<td class='shoppingmalin_td3'><span id='shoppingmalin_message2' class='shoppingmalin_message'><img src='".SHOPPINGMALIN_URL."img/coche-verte.gif?R=".RAND(0,1000)."'></span></td>";
          echo "</tr>";
          echo "</table>";
          ?>
        </form>
     </div>
     <?php
     ///////////////////////////////////////////////////////////////////////////
     /// 3eme onglet ///////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////
     ?>
     <div class="content-3">
        <h2>Meilleur prix</h2>

        Il n'y aura qu'un marchand d'affich&eacute;, celui qui proposera le meilleur prix pour la r&eacute;f&eacute;rence que vous allez chosir ci dessous :<br><br>

        <form>

          <span class='shoppingmalin_titre' style='display: inline-block;'>Type de boutique</span>
          <select name='cat3' id='cat3' style='width:210px;'>
            <option value=''>Type de boutiques</option>
            <option value='4' >Electrom&eacute;nager</option>
            <option value='1' >Hifi - Photo - T&eacute;l&eacute;vision</option>
            <option value='2' >Informatique</option>
            <option value='6' >Jouets</option>
            <option value='8' >Outillage</option>
            <option value='3' >T&eacute;l&eacute;phonie</option>
          </select><br>

          <span class='shoppingmalin_titre' style='display: inline-block;'>R&eacute;f&eacute;rence article</span>
          <input type="text" name="ref3" id="ref3" style='width:210px;'><br>

          <span class='shoppingmalin_titre' style='display: inline-block;'>&nbsp;</span>
          <input type="submit" value="Afficher le shortcode" onclick="Shortcode3(cat3.value, ref3.value); return false;" class="button button-primary">

          <script>
            function Shortcode3(cat3, ref3) {
              ref3 = ref3.replace(/(['"])/g," ");    // enlever simple et double cote - /g : global, toutes les occurrences
              ref3 = ref3.replace(/\s+/g, " ");      // \s+ : espaces consecutifs
              ref3 = ref3.trim();                    // espaces debut et fin
              if (cat3=="")
                {
                 alert("S\351lectionnez un type de boutiques");
                 return false;
                }
              else if (ref3=="")
                {
                 alert("Saisissez la r\351f\351rence d'un article");
                 return false;
                }

              var shortcode3 = '[shoppingmalin cat=\''+cat3+'\' ref=\''+ref3+'\' top=\'1\']';
              document.getElementById('Shortcode3').innerHTML = 'Voici votre shortcode :&nbsp;&nbsp;'+shortcode3+'&nbsp;&nbsp;&nbsp;';

              document.getElementById("shoppingmalin_copier_shortcode3").style.display='block';

              client_shortcode3.on( "copy", function (event) {
                   var clipboard = event.clipboardData;
                   clipboard.setData( "text/plain", shortcode3 );
              });

            }
          </script>

        </form>
        <br>
        <span id="Shortcode3" name="Shortcode3" style="line-height:20px;float:left;"></span>
        <button id="shoppingmalin_copier_shortcode3" style="display:none;float:left;" data-clipboard-text="" title="Copier">Copier</button>

        <script>
          var client_shortcode3 = new ZeroClipboard( document.getElementById("shoppingmalin_copier_shortcode3") );
          client_shortcode3.on( "ready", function( readyEvent ) {
            // alert( "ZeroClipboard SWF is ready!" );
            client_shortcode3.on( "aftercopy", function( event ) {
              event.target.innerHTML = "Ok, copi&eacute;";
              setTimeout(function(){ event.target.innerHTML = "Copier"; }, 2000);
            } );
          } );
        </script>

        <form name='Form3SM_Onglet' id='Form3SM_Onglet' class='FormSM_Onglet' action='http://www.shoppingmalin.com/iframe/validation-onglet3.php' method="POST">
          <input type='hidden' name='Modification' value='3'>
          <input type='hidden' name='CodeActivation' value='<?php echo $ShoppingMalin_CodeActivation; ?>'>
          <?php
          echo "<table border=0 cellspacing=0 cellpadding=0 width='560' style='position: absolute; top: 260px;'>";
          echo "<tr><td colspan='3' height='35'><hr></td></tr>";
          echo "<tr>";
          echo "<td class='shoppingmalin_titre'>Police</td>";
          echo "<td colspan='2'>";
            echo "<Select name='FontFamily3' id='FontFamily3'>";
              $FF = array ("Verdana", "Arial", "Georgia", "Helvetica", "Times New Roman", "Baskerville", "Comic Sans MS", "Helvetica", "Tahoma");
              foreach($FF as $key)
                {
                 echo "<option value='".$key."' ";
                 if ($key==$FontFamily3)
                   echo " selected ";
                 echo ">".$key."</option>";
                }
            echo "</Select><br>";
          echo "</td>";
          echo "</tr>\r\n";

          echo "<tr>";
          echo "<td class='shoppingmalin_titre'>Taille de la police</td>";
          echo "<td colspan='2'>";
            echo "<Select name='FontSize3' id='FontSize3'>";
              for ($i=8;$i<21;$i++)
                {
                 echo "<option value='".$i."' ";
                 if ($i==$FontSize3)
                   echo " selected ";
                 echo ">".$i."</option>";
                }
            echo "</Select> pixels";
          echo "</td>";
          echo "</tr>\r\n";

          //////////////////////////////////////////////////////////////////////

          echo "<tr><td colspan='3'><br></td></tr>";
          echo "<tr>";
            echo "<td colspan='2' class='shoppingmalin_td12'><input type='submit' value='Enregistrer les modifications' class='button button-primary'>&nbsp;&nbsp;</td>";
            echo "<td class='shoppingmalin_td3'>";

              echo "<table border=0 cellspacing=0 cellpadding=0>";
                echo "<tr>";
                  echo "<td><span id='shoppingmalin_message3' class='shoppingmalin_message'><img src='".SHOPPINGMALIN_URL."img/coche-verte.gif?R=".RAND(0,1000)."'></span></td>";
                  echo "<td>&nbsp;</td>";
                  echo "<td><a href = \"javascript:void(0)\" onclick = \"document.getElementById('help3').style.display='block'; \">Astuce !</A></td>";
                echo "</tr>";
              echo "</table>";

            echo "</td>";
          echo "</tr>";
          echo "</table>";
          ?>
        </form>
     </div>
     <?php
     ///////////////////////////////////////////////////////////////////////////
     /// 4eme onglet ///////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////
     ?>
     <div class="content-4">
        <h2>Affiliation</h2>

        Vous pouvez gagner une commission sur les ventes g&eacute;n&eacute;r&eacute;es.<br>
        Pour le moment ceci ne concerne que Amazon.<br><br>

        <?php
        echo "<form name='Form4SM_Onglet' id='Form4SM_Onglet' class='FormSM_Onglet' action='http://www.shoppingmalin.com/iframe/validation-onglet4.php' method='POST'>";
          echo "<input type='hidden' name='Modification' value='4'>";
          echo "<input type='hidden' name='CodeActivation' value='".$ShoppingMalin_CodeActivation."'>";
          echo "Saisissez votre ID de suivi chez Amazon : ";
          echo "<input type='text' name='TabAffiliation[3]' id='TabAffiliation[3]' value='' style='width:120px;'><br><br>";  // 3 = IDSite = Amazon


          echo "Leur programme d'affiliation vous permet de gagner environ 3.5% sur chaque vente.<br>";
          echo "Exemple : Un internaute visite votre site et clique sur le logo d'Amazon. S'il ach&egrave;te une TV &agrave; 600 euros vous gagnez 21 euros.<br><br>";


          echo "Vous pouvez vous inscrire ici : <A HREF='https://partenaires.amazon.fr' target='_blank'>https://partenaires.amazon.fr</A><br><br>";

          echo "Votre identifiant &agrave; saisir ci dessus ressemblera &agrave; quelque chose comme 'storeid-20'<br>";
          echo "Vous le retrouverez en haut &agrave; droite une fois connect&eacute; sur le site Partenaires Amazon.<br><br>";

          echo "<small><br></small><br><br>";

          echo "<table cellspacing=0 cellpadding=0>";
            echo "<tr>";
              echo "<td class='shoppingmalin_td12'><input type='submit' value='Enregistrer les modifications' class='button button-primary'>&nbsp;&nbsp;</td>";
              echo "<td class='shoppingmalin_td3'><span id='shoppingmalin_message4' class='shoppingmalin_message'>&nbsp;<img src='".SHOPPINGMALIN_URL."img/coche-verte.gif?R=".RAND(0,1000)."'></span></td>";
            echo "</tr>";
          echo "</table>";
          echo "<br>";
        echo "</form>";
        ?>

     </div>
     <?php
     ///////////////////////////////////////////////////////////////////////////
     /// 5eme onglet ///////////////////////////////////////////////////////////
     ///////////////////////////////////////////////////////////////////////////
     ?>
     <div class="content-5">
        <h2>Version premium</h2>

        En projet :<br><br>
        Aujourd'hui l'affiliation n'est possible qu'avec Amazon.<br>
        Vous pourrez bient&ocirc;t travailler avec d'autres marchands.
        <br><br>
        D'autres id&eacute;es ? Contactez nous.<br>
        <A HREF="http://www.ShoppingMalin.com" target="_blank">www.ShoppingMalin.com</A>
     </div>

  </div>

  <?php
  //////////////////////////////////////////////////////////////////////////////
  /// Sur onglets : chargement en cours et aides ///////////////////////////////
  //////////////////////////////////////////////////////////////////////////////
  ?>

  <!-- Chargement des donnees -->
  <div id="shoppingmalin_chargement" class="shoppingmalin_chargement">
    <div style="padding-left:18px;">
      <br><br>
      <font class="shoppingmalin_titre">Chargement des donn&eacute;es...</font><br>
    </div>
  </div>

  <!-- HELP 1 -->
  <div id="help1" class="shoppingmalin_help">
    <div style="padding-left:18px;">
      <br><br>
      <font class="shoppingmalin_titre">Param&egrave;tres optionnels</font><br>
      (Ceci est aussi valable pour les shortcodes "R&eacute;f&eacute;rence sp&eacute;cifique" et "Meilleur prix".)<br><br>

      width : largeur du cadre, valeur exprim&eacute;e en pixels.<br>
      height : hauteur du cadre, valeur exprim&eacute;e en pixels.<br>
      frameborder : active/d&eacute;sactive la bordure, mettez 0 ou 1.<br>
      scrolling : d&eacute;termine la pr&eacute;sence d'une barre de d&eacute;filement, mettez auto, yes ou no.<br><br><br>

      <font class="shoppingmalin_titre">Exemple de shortcode :</font><br><br>

      [shoppingmalin]<br>
      [shoppingmalin frameborder='1']<br>
      [shoppingmalin width='300' height='500' scrolling='no']<br>
      [shoppingmalin scrolling='no' frameborder='1']<br><br>

      <div align="center">
        <a href = "javascript:void(0)" onclick = "document.getElementById('help1').style.display='none';" class="button button-primary">RETOUR</a>
      </div>
    </div>
  </div>

  <!-- HELP 2 -->
  <div id="help2" class="shoppingmalin_help">
    <div align=center>
      <br><br>
      <b>Explication : Espace entre les logos des marchands</b><br><br>
      <img src="<?php echo SHOPPINGMALIN_URL; ?>img/help2.jpg" width="339" height="232" border="1">
      <br><br>
      <a href = "javascript:void(0)" onclick = "document.getElementById('help2').style.display='none';" class="button button-primary">RETOUR</a>
    </div>
  </div>

  <!-- HELP 3 -->
  <div id="help3" class="shoppingmalin_help">
    <div style="padding-left:18px;">
      <br><br>
      <b>Astuce : Taille de l'iframe</b><br><br>
      <table cellspacing=0 cellspadding=0>
        <tr>
          <td valign="top" width="400">
            <br>Si vous ne sp&eacute;cifiez pas de dimension, l'iframe fera 100x77px.<br>
            Le prix s'affichera sous le logo du marchand.
          </td>
          <td>
            <img src="<?php echo SHOPPINGMALIN_URL; ?>img/help3a.jpg" width="96" height="74">
          </td>
        </tr>
      </table><br>
      Si vous augmentez la largeur de l'iframe, le prix pourra s'afficher sur le cot&eacute;.<br>
      Exemple avec le shortcode suivant :<br><br>
      [shoppingmalin ref='ue48ju6000' top='1' width='200' height='52']<br><br>
      <img src="<?php echo SHOPPINGMALIN_URL; ?>img/help3b.jpg" width="193" height="55">

      <br><br>
      <div align=center>
        <a href = "javascript:void(0)" onclick = "document.getElementById('help3').style.display='none';" class="button button-primary">RETOUR</a>
      </div>
    </div>
  </div>

  <script>
    function hidehelp() {
     document.getElementById('help1').style.display='none';
     document.getElementById('help2').style.display='none';
     document.getElementById('help3').style.display='none';
    }
  </script>

</section>

<?php
// Traitement des formulaires en ajax
add_action( 'admin_footer-settings_page_shoppingmalin', 'shoppingmalin_fonction_formulaires2' );
function shoppingmalin_fonction_formulaires2() {
  ?>
  <script type="text/javascript" >
    jQuery(document).ready(function($) {
      jQuery('.FormSM_Onglet').on('submit', function(e) {      // #FormSM_Onglet = le id alors que .FormSM_Onglet est base sur la classe, Permet de gerer les 4 d'un coup.
        e.preventDefault();  // J'empeche le comportement par defaut du navigateur
        var $this = $(this); // L'objet jQuery du formulaire
        // Envoi de la requete HTTP en mode asynchrone
        $.ajax({
          url: $this.attr('action'), // Le nom du fichier indique dans le formulaire
          type: $this.attr('method'), // La methode indiquee dans le formulaire (get ou post)
          data: $this.serialize(), // Je serialise les donnees (j'envoie toutes les valeurs presentes dans le formulaire)
          success: function(html) { // Je recupere la reponse du fichier PHP
            // alert(html); // J'affiche cette reponse
            if (html=="OK")
              {
               NomForm = ($this.attr('name'));
               NForm = NomForm.substring(4, 5);
               document.getElementById('shoppingmalin_message'+NForm).style.display='block';
               setTimeout( 'shoppingmalin_fonction_nomessage()', 2000);
              }
          }
        });
      });
    });

    function shoppingmalin_fonction_nomessage(){
       document.getElementById('shoppingmalin_message1').style.display='none';
       document.getElementById('shoppingmalin_message2').style.display='none';
       document.getElementById('shoppingmalin_message3').style.display='none';
       document.getElementById('shoppingmalin_message4').style.display='none';
     }

  </script>
  <?php
}
?>