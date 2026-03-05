<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php bloginfo('description'); ?>">

<!-- OGP -->
<meta property="og:type" content="website">
<meta property="og:locale" content="ja_JP">
<meta property="og:title" content="楽園雅苑">
<meta property="og:description" content="大自然と調和する極上の癒しを提供します。自然美に囲まれた楽園で、贅沢な癒しのひとときをお過ごしください。">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/ogp.png">
<meta property="og:image:alt" content="楽園雅苑 - 大自然と調和する極上の癒し">
<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
<meta property="og:site_name" content="楽園雅苑">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="楽園雅苑">
<meta name="twitter:description" content="大自然と調和する極上の癒しを提供します。自然美に囲まれた楽園で、贅沢な癒しのひとときをお過ごしください。">
<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/ogp.png">

<title><?php echo wp_get_document_title(); ?></title>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
<link rel="preconnect" href="//fonts.googleapis.com">
<link rel="preconnect" href="//fonts.gstatic.com" crossorigin>
<link href="//fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="//cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="//cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/header-footer-style.css">


<?php wp_head(); ?>