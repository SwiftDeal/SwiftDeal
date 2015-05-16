<?php
	$db = new mysqli('swiftdeal.db.11823432.hostedresource.com', 'swiftdeal', 'phpOTL123@', 'swiftdeal');
	$query = $db->query("
				SELECT * FROM items 
				ORDER BY id DESC 
				LIMIT 20
	");
	if($db->affected_rows >= 1){
		echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<rss version="2.0">

<channel>
  <title>SwiftDeal.in | Making Happy Deal</title>
  <link>https://swiftdeal.in</link>
  <description>Rss Feed</description>
  <copyright>2014 SwiftDeal.in All rights reserved.</copyright>
  <docs>https://swiftdeal.in/public/index.php</docs>
  <language>en-us</language>
  <managingEditor>info@swiftdeal.in</managingEditor>
  <webMaster>info@swiftdeal.in</webMaster>
  <textinput>
    <description>Search on SwiftDeal.in</description>
    <title>Go</title>
    <link>https://swiftdeal.in/public/search_results.php?</link>
    <name>keywords</name>
  </textinput>
  <image>
    <url>http://cloudstuffs.com/assets/images/logo.png</url>
    <title>SwiftDeal.in | logo</title>
    <link>https://www.swiftdeal.in</link>
  </image>
<?php while($row = $query->fetch_assoc()){?>
	<item>
		<title><?php echo $row['title'];?></title>
		<description><?php echo $row['description'];?></description>
		<category><?php echo $row['category'];?></category>
		<link>https://swiftdeal.in/public/viewitem.php?item_id=<?php echo $row['id'];?></link>
	</item>
<?php }?>
</channel>
</rss>
<?php }?>