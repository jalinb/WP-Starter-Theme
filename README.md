# Markentum Starter Theme

###### Table of Contents:

1. Installation/Setup
2. Theme Files & Locations
3. Theme Options / Community Options
4. Custom Post Types
5. ACF Content Blocks




## 1. Installation/Setup:

    1. Rename the theme folder to the client name (lowercase and no spaces).
    2. Change "Theme Name" and the "Text Domain" in style.css (the "Text Domain" must be the exact same as the theme folder name). Leave the starter theme as "twentynineteen" and make sure twentynineteen is installed.
    3. Install the starter theme.
    4. Install plugins
        a. Classic Editor
        b. Advanced Custom Fields PRO
        c. Gravity Forms
        d. Yoast
        e. Any others needed (we try to use as few plugins as possible)
    5. Import ACF JSON data that is inside the "dependencies" folder (Gravity Forms MUST be installed before the import). Once you have installed the dependencies, delete that folder.
    6. Open "functions.php" and comment out the unwanted function files.
    7. Open "/functions/theme-enqueue.php" and make changes as needed.
    8. Adjust the "/functions/custom-post-types.php" file according to what custom post types you need.
    9. Create favicons (generate code and icons at https://www.favicon-generator.org/) and put them in the root folder. If multiple favicons are needed for a multisite or multiple communities, then place the favicon files in "favicons" folder.




## 2. Theme Files & Locations:

    1. The core templates are located in the root folder, but those files are only used for the main container architecture and include the necessary templates for each section of the site.
    2. Page templates are located in the (templates) folder. We usually only use page templates for the site-map page, but this could change in the future.
    3. Template parts contain the majority of the starter themes templates. The folder names are pretty self-explanatory for what belongs where.
    4. Inside (template-parts/partials) is where all the re-usable partials are located. The (all-partials.php) is used for including all the flexible content partials. The majority of the files you will be editing will be inside (template-parts/partials/content-blocks), this is where all the ACF flexible content block partials are located.
    5. Our main and responsive stylesheets are located inside the starter themes root directory.
    6. The main stylesheet (style.css) is where all our theme-specific CSS is located. Remember, make sure BootStrap 4 does not already have a class for the CSS you need before adding more CSS styles to this file (https://getbootstrap.com/docs/4.4/getting-started/introduction/).
    7. The responsive stylesheet (responsive.css) is only used for responsive styling. If at all possible only use the media queries already provided inside that file.
    8. The assets folder contains all the other assets needed for the starter theme; this will mainly consist of BootStrap 4 and Fontawesome files; however, you will still edit some files in here. Such as app.js for all the starter themes custom jQuery. This file is located here (/assets/js/app.js).
    9. If you need to place in files that should not go in WP's media manager, then create a folder and put it inside the assets folder. An example would be floor plan PDFs, those files would be located here (/assets/floor-plans/).




## 3. Theme Options / Community Options:

    1. Theme options settings are for general content that is used throughout the site in multiple areas. Some examples would be Navigation Menu, Logos, Colors, Address, Phone Numbers, Google Maps, Social Media, etc.
    2. Community options settings are similar to theme options, but they are specefic to that community. Settings in here will overwrite theme options when on that specific communities' pages.
    3. Theme Options are used for the wp-login screen. The login screen pulls logos and colors from the options; this is done by overwriting core functions. The function for this is located here (/functions/wp-overwrites.php).
    4. The wp-overwrites file also has other WP core function overwrites. Such as displaying page IDs in the WP dashboard, removing the auto paragraph function, allowing SVG file uploads to the media manager, and more.




## 4. Custom Post Types:

    1. The default custom post type functions (/functions/custom-post-types.php) has a "communities" taxonomy and a "community" post type.
    2. Create and remove post types and taxonomies as needed. Use this as refernece on creating custom post types (https://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/), scroll down to "Creating a Custom Post Type Manually".




## 5. ACF Content Blocks:

    1. We use ACF to it's fullest capacity, for documentation, please go here (https://www.advancedcustomfields.com/resources/).
    2. We use clone field groups for things like buttons. When you are creating a new flexible content or repeater field that uses a button, you will create a clone field and then pull in all fields from the button field group (https://www.advancedcustomfields.com/resources/clone/).
    3. Theme options pages are created by a function that adds options through ACF. That function is located here (/functions/advanced-custom-fields.php). Once you create a field group, you will select the display rules and choose options page and whichever one it is equal to (https://www.advancedcustomfields.com/resources/options-page/).
    4. For page sections that are used multiple times throughout the site, we create flexible content blocks for these and build a template partial for each (https://www.advancedcustomfields.com/resources/flexible-content/).