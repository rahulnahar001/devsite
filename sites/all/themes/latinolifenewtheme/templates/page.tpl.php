<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template. 
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<div id="page-wrapper"><div id="bannerlateral"><div id="internobannerlateral1"></div><div id="internobannerlateral2"></div></div> <div id="page">

<div id="headercontainer">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="header"><div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
    <?php endif; ?>
<br />
<div id="navigation">
    <?php if ($page['navigation'] || $main_menu): ?>
      <div class="section clearfix">

        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
</div>
        <?php print render($page['navigation']); ?>

      </div><!-- /.section, /#navigation -->
    <?php endif; ?>

    <?php print render($page['header']); ?>

  </div></div>
  </td>
  
   <td class="rhs_searchnews">
   
  <div id="headersearch"><a href="/search"><img src="/sites/default/files/searchbox.jpg" width="117" height="117" /></a></div>
  <div id="subscribe"><a href="/newsletter"><img src="/sites/all/themes/latinolifenewtheme/images/newsletter.jpg" width="118" height="60" /></a></div>
  
  <div id="mini-banner-area"><?php print render($page['mini_header_banner']); ?></div>
  
  
  </td>
  </tr>
</table>

  
  
  </div><!-- /.section, /#header -->
 	
    <div id="highlighted">
		<?php print render($page['highlighted']); ?>
    </div>
    
    <div id="degrade"><div id="submenuheader"><a href="http://latinolife.co.uk/?q=node/364">What's on</a> | <a href="http://latinolife.co.uk/?q=music%20magazine%20page">Music</a> | <a href="http://latinolife.co.uk/?q=magazine%20dance%20page">Dance</a> | <a href="http://latinolife.co.uk/?q=Arts%20and%20Culture%20magazine%20page">Arts and Culture</a> | <a href="http://latinolife.co.uk/?q=Society%20and%20Politics%20magazine%20page">Society and Politics </a>| <a href="http://latinolife.co.uk/?q=sports">Sports</a> | <a href="http://latinolife.co.uk/?q=travel">Travel</a> | <a href="http://latinolife.co.uk/?q=about%20us">About Us / Contact Us</a> | <a href="http://latinolife.co.uk/?q=galleria">Gallery</a> | <a href="http://latinolife.co.uk/?q=taxonomy/term/149">Reviews</a></div>
    </div>
    
  <div id="main-wrapper"><div id="main" class="clearfix<?php if ($main_menu || $page['navigation']) { print ' with-navigation'; } ?>">
    
    <div id="content" class="column"><div class="section">
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if ($tabs = render($tabs)): ?>
        <div class="tabs"><?php print $tabs; ?></div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div></div><!-- /.section, /#content -->

   

   <?php print render($page['sidebar_first']); ?>
    <?php print render($page['sidebar_second']); ?>

      
      </div><!-- /#main, /#main-wrapper -->

  

  <?php print render($page['footer']); ?>

</div></div><!-- /#page, /#page-wrapper -->

<?php print render($page['bottom']); ?>
