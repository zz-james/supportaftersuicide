<?php
  /**
   * Template Name: Webchat
   */
  
  if (isset($_GET['show']) && !isset($_SESSION['webchat_questionnaire'])) {
    header('Location: /help/webchat/');
    exit;
  }
?>

<?php get_header(); ?>

<main class="main-single-page">
  <?php if (have_posts()) while(have_posts()): the_post(); ?>
    <div class="hero hero-default hero-single-page">
      <?php $hero_image_theme_class = "hero-image-theme-" . rand(1,3); ?>
      <div class="hero-image <?php echo($hero_image_theme_class); ?>"></div>
      
      <h2 class="entry-title entry-title-single-page">
        <span><?php the_title(); ?></span>
      </h2>
    </div>

    <div class="page-navigation">
      <?php simple_section_nav(); ?>
    </div>
    
    <div class="content content-single-page">
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content entry-content-single-page">

          <?php if (!IPDeny::allowsCurrentUserIP()): ?>
            <?php the_field ('webchatpage_webchat_not_uk'); ?>
          <?php else: ?>
            <?php if (!$webchat_open): ?>
              <div>
                <?php the_field('webchatpage_webchat_closed'); ?>
              </div>
            <?php else: ?>
              <?php if (isset($_GET['show'])): ?>
                  <div>
                    <?php the_content(); ?>
                  </div>
                  
                  <div class="webchat-atm">
                    <img
                      src="/wp-content/themes/CALMV3/assets/images/button-start-webchat.png"
                      id="chat_link_1068"
                      title="click to start live chat .."
                      style="cursor: pointer;"
                    >
                  </div>
              <?php else: ?>
                <?php the_field ('webchatpage_webchat_intro'); ?>
                <?php gravity_form('Webchat Questionnaires (new)', true, true, false, null, false, 0); ?>
              <?php endif ?>
            <?php endif ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  
  <div class="sidebar sidebar-single-post">
    <?php get_sidebar('page'); ?>
  </div>
</main>

<?php get_footer(); ?>



<script src="https://secure.callhandling.co.uk/assets/cc2/ScriptService.svc/get?name=PublicChat_Widget" type="text/javascript">  </script>

<script type="text/javascript">
  jQuery(function($) {

    // Fix the forms:
    $($('#field_7_5').prevAll().get().reverse()).wrapAll('<div class="pre-chat"></div>');
    $('#field_7_5').nextAll().wrapAll('<div class="post-chat"></div>');
    $('.post-chat').hide();
    $( ".gform_button" ).attr( "value", "Continue" );
    $('.webchat-questionnaires ul.gform_fields .gsection').remove();

    $(document).ready(function() {


    
    })

    window.chatStatus = "online";
    
    // Start the chat:
    __chsChatConnector.Init({
      GroupID          : 1068,
      ImageContainerID : "chat_link_1068",
      OnlineImageUrl   : "/wp-content/themes/CALMV3/assets/images/button-start-webchat.png",
      OfflineImageUrl  : "/wp-content/themes/CALMV3/assets/images/button-webchat-closed.png",
      
      OnClickedWhenOffline: function() {
        window.chatStatus = "offline";
        alert("Sorry, the webchat is currently closed");
      }
    });

    
    $('#chat_link_1068').click(function() {
      if (window.chatStatus != "offline") {
        setTimeout(function() {
          window.webchatPopup = window.open("", "CHS_ChatWindow_1068");
          
          window.webchatStatusChecker = setInterval(function() {
            if (window.webchatPopup.closed == true) {
              clearInterval(window.webchatStatusChecker);
              window.location = "/help/webchat/survey/";
            }
          }, 250);
        }, 4000);
      }
    });
  });
</script>
