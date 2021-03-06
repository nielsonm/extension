<?php
// $Id: page.tpl.php,v 1.1.2.5 2010/01/11 00:09:05 sociotech Exp $
if ($logo == $base_path.$directory.'/logo.png')
{
	$logo = $base_path.$directory.'/logo.jpg';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>" id="html-alpha">

  <head>
    <title><?php print $title.' | '.$site_name; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <?php print $setting_styles; ?>
		 <?php print $local_styles; ?>
		 <link href="/sites/default/themes/extension/css/special.css" rel="stylesheet"/>
    <!--[if IE 8]>
      <?php print $ie8_styles; ?>
    <![endif]-->
    <!--[if IE 7]>
      <?php print $ie7_styles; ?>
    <![endif]-->
    <?php print '<!--[if lte IE 6]>'.$ie6_styles.'<![endif]-->';?>
    <link href="/sites/default/themes/extension/css/google_cse_override.css" rel="stylesheet"/>
    <?php print $scripts; ?>
  </head>

  <body id="<?php print $body_id; ?>" class="<?php print $body_classes; ?>">
    <!--[if lte IE 6]>
      <div id="ie6warning"></div>
      <script type="text/javascript">
        if (document.cookie.indexOf('ie6ignore') < 0) {
          if (document.cookie.indexOf('ie6first') < 0) {
            $('#ie6warning').slideDown();
            document.cookie = escape('ie6first') + '=' + escape('true');
          } else {
            document.getElementById('ie6warning').style.display = 'block';
          }
          document.getElementById('ie6warning').innerHTML = '<a href="#" id="ie6close">x</a><div class="ie6wbox"><div><b>NOTICE:</b> Your version of Internet Explorer is out of date, and may have trouble displaying content on this site correctly. Please consider upgrading to one of these newer browsers:<br/><a target="_blank" href="http://windows.microsoft.com/en-US/internet-explorer/downloads/ie">Internet Explorer 8</a> | <a target="_blank" href="http://www.mozilla.com/en-US/firefox/new/">Firefox</a> | <a target="_blank" href="http://www.google.com/chrome">Google Chrome</a> | <a target="_blank" href="http://www.apple.com/safari/">Safari</a> | <a target="_blank" href="http://www.opera.com/">Opera</a></div></div>';
          document.getElementById('ie6close').onclick = function() {
            $('#ie6warning').slideUp();
            document.cookie = escape('ie6ignore') + '=' + escape('true');
          }
        }
      </script>
    <![endif]-->
    <?php
      if (stristr($body_classes, 'first-main-last') != FALSE) {
        $sidebar_last_width = 'grid16-4';
        $sidebar_first_width = 'grid16-4';
      } else if (stristr($body_classes, 'not-front') == FALSE && (variable_get('extension_settings_site_type', 0) == 0 && stristr(variable_get('extension_settings_sitename', 0), 'Extension News') == FALSE)) {
        $sidebar_last_width = 'grid16-6';
      } else if (stristr($body_classes, 'not-front') == FALSE && (variable_get('extension_settings_site_type', 0) != 0 || stristr(variable_get('extension_settings_sitename', 0), 'Extension News') != FALSE)) {
        $sidebar_last_width = 'grid16-5';
      }
      $content_group_width = 'grid16-'.(substr($grid_width, 7) - (substr($sidebar_first_width, 7) + substr($sidebar_last_width, 7)));
      $main_group_width = 'grid16-'.(substr($grid_width, 7) - substr($sidebar_first_width, 7));
    ?>
    <div id="page" class="page">
      <div id="page-inner" class="page-inner">
        <div id="skip">
          <a href="#main-content-area"><?php print t('Skip to Main Content Area'); ?></a>
        </div>

        <!-- header-top row: width = grid_width -->
        <div id="header-top-wrapper" class="header-top-wrapper full-width">
          <div id="header-top" class="<?php if ($search_box): ?>header-top-search<?php endif; ?> header-top row <?php print $grid_width; ?>">
            <div id="header-top-inner" class="header-top-inner inner clearfix">
              <div id="osu-top-hat">
                <a href="http://oregonstate.edu/" title="Link to OSU homepage">
                  <img class="tag" src="<?php print $base_path . $directory . '/images/extension/gif/lay_hdr_tag.gif';?>" width="101px" height="119px" alt="Oregon State University" />
                </a>
              </div><!-- /osu-top-hat -->

              <div id="header-top-links">
                <?php if (variable_get('extension_settings_site_type', 0) != 4) {
					if (stristr(theme('grid_row', $header_top, 'header-top-region', 'full-width', $grid_width), 'header-top-link') == FALSE) { ?>

				 <a href="http://extension.oregonstate.edu/node/312">Donate</a>
                  &nbsp; |&nbsp;&nbsp;
                  <a href="http://extension.oregonstate.edu/node/3248">Calendar</a>
                  &nbsp;&nbsp;|&nbsp;&nbsp;
                  <a href="http://outreach.oregonstate.edu">Outreach &amp; Engagement</a>

                <?php }
				} ?>
              </div>
              <?php print theme('grid_row', $header_top, 'header-top-region', 'full-width', $grid_width); ?>
              <?php print theme('grid_block', $search_box, 'search-box'); ?>
            </div><!-- /header-top-inner -->
          </div><!-- /header-top -->
        </div><!-- /header-top-wrapper -->

        <!-- adds shadow graphic around page -->
        <div id="content-wrapper" class="<?php if (stristr($body_classes, 'first-main-last') != FALSE){print 'page-sidebar-both'; $sidebar_last_width = 'grid16-4'; $content_group_width = 'grid16-8';} else if (stristr($body_classes, 'first') != FALSE){print 'page-sidebar-first';} else if (stristr($body_classes, 'not-front') == FALSE && variable_get('extension_settings_site_type', 0) == 0){print 'page-sidebar-home';} else if (stristr($body_classes, 'last') != FALSE){print 'page-sidebar-last';} else{print 'page-sidebar-none';} ?>">
          <!-- header-group row: width = grid_width -->
          <div id="header-group-wrapper" class="header-group-wrapper <?php print $grid_width; ?>">
            <div id="header-group" class="header-group row <?php print $grid_width; ?>">
              <div id="header-group-inner" class="header-group-inner inner clearfix">
                <div id="header-site-info" class="header-site-info block">
                  <div id="header-site-info-inner" class="header-site-info-inner inner clearfix">
                    <a id="logo" title="<?php print $site_name;?>" href="<?php print check_url($front_page); ?>">
                    	<img src="<?php print $logo;?>">
                    </a><!-- /logo -->
                  </div><!-- /header-site-info-inner *** newly added closing tag ****-->
                </div><!-- /header-site-info -->

                <?php print $header; ?>
              </div><!-- /header-group-inner -->
            </div><!-- /header-group -->
          </div><!-- /header-group-wrapper -->

          <!-- primary-menu row: width = grid_width -->
          <div id="header-primary-menu-wrapper" class="header-primary-menu-wrapper full-width">
            <div id="header-primary-menu" class="header-primary-menu row <?php print $grid_width; ?>">
              <div id="header-primary-menu-inner" class="header-primary-menu-inner inner <?php if (variable_get('extension_settings_site_type', 0) == 0 && stristr(theme('grid_row', $preface_top, 'preface-top', 'full-width', $grid_width), '<div') != FALSE) { print 'ext-home-special ';} ?>clearfix">
                <?php  // add either extension or AES menu or if custom the primary links menu
                  switch (variable_get('extension_settings_site_type', 0)) {
                  case 0: // main extension site
                    $thisServerPath = variable_get('extension_settings_server_path', '/www/virtual/');
                    $filename = 'primary_links_menu.inc';
                    $server_path_file_name = $thisServerPath . '/_includes/' . $filename;
                    if (file_exists($server_path_file_name)) {
                      include_once($server_path_file_name);
                    }
					else {
	                      include_once( './sites/default/themes/extension/primary_links_menu.html');
					}
                    break;
                  case 1: // county site
                    $thisServerPath = variable_get('extension_settings_server_path', '/www/virtual/');
                    $filename = 'primary_links_menu.inc';
                    $server_path_file_name = $thisServerPath . '/_includes/' . $filename;
                    if (file_exists($server_path_file_name)) {
                      include_once($server_path_file_name);
                    }
					else {
						include_once( './sites/default/themes/extension/primary_links_menu.html');
					}
                    break;
                  case 2: // branch station
                    $thisServerPath = variable_get('extension_settings_server_path', '/www/virtual/');
                    $filename = 'primary_links_aes_menu.inc';
                    $server_path_file_name = $thisServerPath . '/_includes/' . $filename;
                    if (file_exists($server_path_file_name)) {
                      include_once($server_path_file_name);
                    }
                    break;
                  case 3: // combined site
                    $thisServerPath = variable_get('extension_settings_server_path', '/www/virtual/');
                    $filename = 'primary_links_aes_menu.inc';
                    $server_path_file_name = $thisServerPath . '/_includes/' . $filename;
                    if (file_exists($server_path_file_name)) {
                      include_once($server_path_file_name);
                    }
                    break;
                  case 4: // custom
                    print theme('grid_block', $primary_links_tree, 'primary-menu');
                    break;
                  default: // use extension links
                    $server_path_file_name =  './sites/default/themes/extension/primary_links_menu.html';
                    if (file_exists($server_path_file_name)) {
                      include_once($server_path_file_name);
                    }
                    break;
                  }
                ?>

              </div><!-- /header-primary-menu-inner -->
            </div><!-- /header-primary-menu -->
          </div><!-- /header-primary-menu-wrapper -->

          <?php/* print theme('grid_block', $breadcrumb, 'breadcrumbs'); */?>


          <!-- preface-top row: width = grid_width -->
          <?php print theme('grid_row', $preface_top, 'preface-top', 'full-width', $grid_width); ?>


          <!-- main row: width = grid_width -->
          <div id="main-wrapper" class="main-wrapper full-width">
            <div id="main" class="main row <?php print $grid_width; ?>">
              <div id="main-inner" class="main-inner inner clearfix">
                <?php print theme('grid_row', $sidebar_first, 'sidebar-first', 'nested', $sidebar_first_width); ?>

                <!-- main group: width = grid_width - sidebar_first_width -->
                <div id="main-group" class="main-group row nested <?php print $main_group_width; ?>">
                  <div id="main-group-inner" class="main-group-inner inner">
                    <?php print theme('grid_row', $preface_bottom, 'preface-bottom', 'nested'); ?>

                    <div id="main-content" class="main-content row nested">
                      <div id="main-content-inner" class="main-content-inner inner">
                        <!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
                        <div id="content-group" class="content-group row nested <?php print $content_group_width; ?>">
                          <div id="content-group-inner" class="content-group-inner inner">
                            <?php // this is the orginal position for the crumb trail
                              print theme('grid_block', $breadcrumb, 'breadcrumbs');
                            ?>

                            <?php if ($content_top || $help || $messages): ?>
                              <div id="content-top" class="content-top row nested">
                                <div id="content-top-inner" class="content-top-inner inner">
                                  <?php print theme('grid_block', $help, 'content-help'); ?>
                                  <?php print theme('grid_block', $messages, 'content-messages'); ?>
                                  <?php print $content_top; ?>
                                </div><!-- /content-top-inner -->
                              </div><!-- /content-top -->
                            <?php endif; ?>

                            <div id="content-region" class="content-region row nested">
                              <div id="content-region-inner" class="content-region-inner inner">
                                <a name="main-content-area" id="main-content-area"></a>
                                <?php print theme('grid_block', $tabs, 'content-tabs'); ?>
                                <div id="content-inner" class="content-inner block">
                                  <div id="content-inner-inner" class="content-inner-inner inner">
                                    <?php if ($title): ?>
                                      <h1 class="title"><?php print $title; ?></h1>
                                    <?php endif; ?>
                                    <?php if ($content): ?>
                                      <div id="content-content" class="content-content">
                                        <?php
                                          $raw = $content;
                                          for ($i=substr($content_group_width, 7); $i<17; $i++) {
                                            $raw = str_replace('grid16-'.$i,'grid16-'.(substr($content_group_width, 7)-1), $raw);
                                          }
                                          if ($content_right) {
                                            $raw_parts = explode('<div class="content clearfix">', $raw);
                                            $raw_parts['1'] = '<div id="content-right" class="content-right grid16-4"><div id="content-right-inner" class="content-right-inner inner">' . $content_right . '</div></div>' . $raw_parts['1'];
                                            $raw = implode('<div class="content clearfix">', $raw_parts);
                                            print $raw;
                                          } else {
                                            print $raw;
                                          }
                                        ?>
                                      </div><!-- /content-content -->
                                    <?php endif; ?>
                                  </div><!-- /content-inner-inner -->
                                </div><!-- /content-inner -->
                              </div><!-- /content-region-inner -->
                            </div><!-- /content-region -->
                            <?php
                              $raw = theme('grid_row', $content_bottom, 'content-bottom', 'nested');
                              for ($i=substr($content_group_width, 7); $i<17; $i++) {
                                $raw = str_replace('grid16-'.$i,'grid16-'.(substr($content_group_width, 7)-1), $raw);
                              }
                              print $raw;
                            ?>
                          </div><!-- /content-group-inner -->
                        </div><!-- /content-group -->
                      <?php
                        $raw = theme('grid_row', $sidebar_last, 'sidebar-last', 'nested', $sidebar_last_width);
                        for ($i=4; $i<7; $i++) {
                          $raw = str_replace('grid16-'.$i, $sidebar_last_width, $raw);
                        }
                        print $raw;  
                      ?>
                    </div><!-- /main-content-inner -->
                  </div><!-- /main-content -->

                  <?php print theme('grid_row', $postscript_top, 'postscript-top', 'nested'); ?>
                </div><!-- /main-group-inner -->
              </div><!-- /main-group -->
            </div><!-- /main-inner -->
          </div><!-- /main -->
        </div><!-- /main-wrapper -->

      </div> <!-- /content-wrapper -->
      <?php // create link to login page or logout depending on user status
        if (!$logged_in) {
          if (function_exists('osu_sso_perm')) {
            if ($node->nid) {
              $log_path = 'login?destination=node%2F'.$node->nid;
            } else {
              $log_path = 'login';
            }
          } else {
            if ($node->nid) {
              $log_path = 'user/login?destination=node%2F'.$node->nid;
            } else {
              $log_path = 'user/login';
            }
          }
          $log_print = 'login';
        } else {
          $log_path = 'logout';
          $log_print = 'logout';
        }
      ?>
      <!-- postscript-bottom row: width = grid_width -->
      <?php print theme('grid_row', $postscript_bottom, 'postscript-bottom', 'full-width', $grid_width); ?>

      <!-- footer row: width = grid_width -->
      <?php print theme('grid_row', $footer, 'footer', 'full-width', $grid_width); ?>

      <!-- footer-message row: width = grid_width -->
      <div id="footer-message-wrapper" class="footer-message-wrapper full-width">
        <div id="footer-message" class="footer-message row <?php print $grid_width; ?>">
          <div id="footer-message-inner" class="footer-message-inner inner clearfix">
            <div style="display: block; float: right; text-align: right; width: 0px; overflow: visible; margin-right: 40px;"><a rel="nofollow" style="color:#666;" href="<?php print $base_path.$log_path; ?>"><?php print $log_print; ?></a></div>
            <div style="display: inline; width: 100%; margin: auto; text-align: center;">
              <span><a href="http://oregonstate.edu/main/about/copyright">Copyright</a> &copy; 1995-<?php print date(Y);?> <a href="http://oregonstate.edu">Oregon State University</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://oregonstate.edu/main/about/disclaimer/">Web Disclaimer</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://extension.oregonstate.edu/node/3299">Equal Opportunity&#47;Accessibility</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php print variable_get('extension_settings_webmaster_link', 'http://extension.oregonstate.edu/employee/extension-webmaster');?>">Contact the Webmaster</a></span><br/></span></div>

              <?php print theme('grid_block', $footer_message, 'footer-message-text'); ?>
            </div><!-- /footer-message-inner -->
          </div><!-- /footer-message -->
        </div><!-- /footer-message-wrapper -->

      </div><!-- /page-inner -->
    </div><!-- /page -->

    <?php print str_replace('/sites/default/modules/google_cse/google_cse.js', '/sites/default/themes/extension/js/google_cse_override.js', $closure); ?>
  </body>
</html>
