sh404sef Plugin For BreezingForms instructions:

1. Install and enable the plugin

---------------

2. For BreezingForms builds lower or equal to 753: if you are using BreezingForms until build 753, please copy the file "router.php" into /components/com_breezingforms/.

---------------

3. optional: sometimes it happens that breezing forms has trouble when being loaded in an article and the joomla cache is enabled (no submission is recorded). In this case, install and enable the plg_cachecontrol.zip plugin. In the rules configuration, add one or more rules to skip caching for the article where the form is loaded into, example:

option=com_content&id=999

Where 999 is the id of the article

---------------

Done!

Your Crosstec Team