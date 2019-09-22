<?php
define("DOC_ROOT", getenv('DOC_ROOT'));
define('WEB_ROOT', getenv('WEB_ROOT'));

define("SQL_HOST", getenv('SQL_HOST'));
define("SQL_DATABASE", getenv('SQL_NAME'));
define("SQL_USER", getenv('SQL_USER'));
define("SQL_PASSWORD", getenv('SQL_PASSWORD'));
define("LOGIN_PAGE", getenv('LOGIN_PAGE'));
define("COPYRIGHT", getenv('COPYRIGHT'));
define("LOGO", getenv('LOGO'));
define("LOGO_SMALL", getenv('LOGO_SMALL'));
define("FAVICON", getenv('FAVICON'));
define("THEME", getenv('THEME'));
define("PORTLET_COLOR", getenv('PORTLET_COLOR'));
define("INTRODUCTION", getenv('INTRODUCTION'));
define("BUTTON_COLOR", getenv('BUTTON_COLOR'));

define("VIDEO_CONFERENCES_CATALOG", getenv('VIDEO_CONFERENCES_CATALOG'));
define("FINANCES", getenv('FINANCES'));
define("VIDEO_CONFERENCES", getenv('VIDEO_CONFERENCES'));
define("REQUESTS", getenv('REQUESTS'));
define("MESSAGES_INSTRUCTOR", getenv('MESSAGES_INSTRUCTOR'));
define("COST_TABLE_INSTRUCTOR", getenv('COST_TABLE_INSTRUCTOR'));
define("VEHICLES_REPORT", getenv('VEHICLES_REPORT'));
define("SUBJECTS_REPORT", getenv('SUBJECTS_REPORT'));
define("INSTRUCTORS_REPORT", getenv('INSTRUCTORS_REPORT'));
define("STUDENT_MANUAL", getenv('STUDENT_MANUAL'));

define("ITEMS_PER_PAGE", "20");
define("MIN_YEAR", 2009);
define("MAX_YEAR", 2030);
define("DAYS_NOTIFICATION", 15);

define("DEBUG_MODE", filter_var(getenv('DEBUG_MODE'), FILTER_VALIDATE_BOOLEAN));

define("COMPANY_PHONE", getenv('COMPANY_PHONE'));
define("COMPANY_EMAIL", getenv('COMPANY_EMAIL'));
define("COMPANY_PRIVACY", getenv('COMPANY_PRIVACY'));
define("COMPANY_URL", getenv('COMPANY_URL'));
define("COMPANY_FACEBOOK", getenv('COMPANY_FACEBOOK'));
define("COMPANY_ADDRESS", getenv('COMPANY_ADDRESS'));

define("EMAIL_HOST", getenv('EMAIL_HOST'));
define("EMAIL_USERNAME", getenv('EMAIL_USERNAME'));
define("EMAIL_PASSWORD", getenv('EMAIL_PASSWORD'));
define("EMAIL_DEBUG", getenv('EMAIL_DEBUG'));

define("IS_TEACHER", 4);


