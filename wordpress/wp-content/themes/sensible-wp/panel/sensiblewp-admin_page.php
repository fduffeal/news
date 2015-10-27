<?php

function sensiblewp_admin_page_styles() {
    wp_enqueue_style( 'sensiblewp-font-awesome-admin', get_template_directory_uri() . '/fonts/font-awesome.css' ); 
	wp_enqueue_style( 'sensiblewp-style-admin', get_template_directory_uri() . '/panel/css/theme-admin-style.css' ); 
}
add_action( 'admin_enqueue_scripts', 'sensiblewp_admin_page_styles' ); 

     
    add_action('admin_menu', 'sensiblewp_setup_menu');
     
    function sensiblewp_setup_menu(){
    	add_theme_page( __('Sensible Theme Details', 'sensible-wp' ), __('Sensible Theme Details', 'sensible-wp' ), 'edit_theme_options', 'sensiblewp-setup', 'sensiblewp_init' );
    }  
     
 	function sensiblewp_init(){ 
	 	echo '<div class="grid grid-pad"><div class="col-1-1"><h1 style="text-align: center;">';
		printf( __('Thank you for using Sensible!', 'sensible-wp' )); 
        echo "</h1></div></div>";
			
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;" ><div class="col-1-3"><h2>'; 
		printf( __('Sensible Theme Setup', 'sensible-wp' )); 
        echo '</h2>';
		
		echo '<p>';
		printf( __('We created a quick theme setup video to help you get started with Sensible. Watch the video with the link below.', 'sensible-wp' )); 
		echo '</p>'; 
		
		echo '<a href="http://modernthemes.net/documentation/sensible-documentation/sensible-theme-setup/" target="_blank"><button>';
		printf( __('View Video', 'sensible-wp' ));
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( __('Documentation', 'sensible-wp' ));
        echo '</h2>';  
		
		echo '<p>';
		printf( __('Check out our Sensible Documentation to learn how to use Sensible and for tutorials on theme functions. Click the link below.', 'sensible-wp' )); 
		echo '</p>'; 
		
		echo '<a href="http://modernthemes.net/documentation/sensible-documentation/" target="_blank"><button>'; 
		printf( __('Read Docs', 'sensible-wp' ));
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( __('About ModernThemes', 'sensible-wp' )); 
        echo '</h2>';  
		
		echo '<p>';
		printf( __('Want more to learn more about ModernThemes? Let us help you at www.modernthemes.net.', 'sensible-wp' ));
		echo '</p>';
		
		echo '<a href="http://modernthemes.net/" target="_blank"><button>';
		printf( __('About Us', 'sensible-wp' ));
		echo '</button></a></div></div>';
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( __('Want more features? Go Pro.', 'sensible-wp' ));  
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-cogs"></i><h4>';
		printf( __('Post Format Options', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Add unlimited Services and Team Members using post formats instead of Customizer content. Comes with more content options that are easier to use.', 'sensible-wp' ));
		echo '</p></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-image"></i><h4>';
        printf( __('Home Page Slider', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Add multiple slides to your front page. Create slides from Image post formats and customize the settings in the Theme Customizer. ', 'sensible-wp' ));
		echo '</p></div>'; 
		
        echo '<div class="col-1-4"><i class="fa fa-th"></i><h4>';
		printf( __('Home Templates + Sections', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'Add widgets to home sections for a contact form, skill bars, and details spinner. Includes home page templates for Full-Screen Slider and Video Banner.', 'sensible-wp' )); 
		echo '</p></div> '; 
            
        echo '<div class="col-1-4"><i class="fa fa-shopping-cart"></i><h4>'; 
		printf( __( 'WooCommerce', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'Turn your website into a powerful eCommerce machine. Sensible Pro is fully compatible with WooCommerce.', 'sensible-wp' ));
		echo '</p></div></div>';
            
        echo '<div class="grid grid-pad senswp"><div class="col-1-4"><i class="fa fa-th-list"></i><h4>';
		printf( __( 'More Sidebars', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'Sometimes you need different sidebars for different pages. We got you covered, offering up to 5 different sidebars.', 'sensible-wp' ));
		echo '</p></div>';
		
       	echo '<div class="col-1-4"><i class="fa fa-font"></i><h4>More Google Fonts</h4><p>';
		printf( __( 'Access an additional 65 Google fonts with Sensible Pro right in the WordPress customizer.', 'sensible-wp' ));
		echo '</p></div>'; 
		
       	echo '<div class="col-1-4"><i class="fa fa-file-image-o"></i><h4>';
		printf( __( 'PSD Files', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'Premium versions include PSD files. Preview your own content or showcase a customized version for your clients.', 'sensible-wp' ));
		echo '</p></div>';
            
        echo '<div class="col-1-4"><i class="fa fa-support"></i><h4>';
		printf( __( 'Free Support', 'sensible-wp' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'Call on us to help you out. Premium themes come with free support that goes directly to our support staff.', 'sensible-wp' ));
		echo '</p></div></div>';
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="http://modernthemes.net/wordpress-themes/sensible-pro/" target="_blank"><button class="pro">'; 
		printf( __( 'View Pro Version', 'sensible-wp' ));
		echo '</button></a></div></div>';
		
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( __('Premium Membership. Premium Experience.', 'sensible-wp' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-cogs"></i><h4>'; 
		printf( __('Plugin Compatibility', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Use our new free plugins with this theme to add functionality for things like projects, clients, team members and more. Compatible with all premium themes!', 'sensible-wp' ));
		echo '</p></div>';
		
		echo '<div class="col-1-4"><i class="fa fa-desktop"></i><h4>'; 
        printf( __('Agency Designed Themes', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('Look as good as can be with our new premium themes. Each one is agency designed with modern styles and professional layouts.', 'sensible-wp' ));
		echo '</p></div>'; 
		
        echo '<div class="col-1-4"><i class="fa fa-users"></i><h4>';
        printf( __('Membership Options', 'sensible-wp' ));
		echo '</h4>';
		
        echo '<p>';
		printf( __('We have options to fit every budget. Choose between a single theme, or access to all current and future themes for a year, or forever!', 'sensible-wp' ));
		echo '</p></div>'; 
		
		echo '<div class="col-1-4"><i class="fa fa-calendar"></i><h4>'; 
		printf( __( 'Access to New Themes', 'sensible-wp' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( __( 'New themes added monthly! When you purchase a premium membership you get access to all premium themes, with new themes added monthly.', 'sensible-wp' ));   
		echo '</p></div>';
		
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="https://modernthemes.net/premium-wordpress-themes/" target="_blank"><button class="pro">'; 
		printf( __( 'Get Premium Membership', 'sensible-wp' )); 
		echo '</button></a></div></div>';
		
		
		echo '<div class="grid grid-pad"><div class="col-1-1"><h2 style="text-align: center;">'; 
		printf( __( 'Changelog' , 'sensible-wp' ) );
        echo "</h2>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.1.7 - Fix: issues with Landscape view on mobile devices.' , 'sensible-wp' ) ); 
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.1.6 - added Navigation section that was deleted when WordPress switched to 4.3. Removed color options from Menu Locations.' , 'sensible-wp' ) ); 
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.1.5 - minor bug fixes' , 'sensible-wp' ) ); 
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.1.3 - fixed Social Icons section to make them centered if no text is displayed' , 'sensible-wp' ) ); 
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.1.2 - updated Font Awesome icons.' , 'sensible-wp' ) ); 
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.1.1 - minor bug fixes.' , 'sensible-wp' ) ); 
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.1.0 - added pt_BR translation.' , 'sensible-wp' ) ); 
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.0.36 - minor bug fixes' , 'sensible-wp' ) );
        echo "</p>";
		
		echo '<p style="text-align: center;">'; 
		printf( __( '1.0.35 - added zn_CH translation.' , 'sensible-wp' ) );
        echo "</p>";
		
		echo '<p style="text-align: center;">';
		printf( __('1.0.34 - added option to change blog header background. Go to Appearance -> Customize -> Blog Layout to add Blog Header background.', 'sensible-wp' )); 
		echo '</p></div></div>'; 
		
    }
?>