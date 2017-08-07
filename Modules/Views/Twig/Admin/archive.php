<?php include_once 'header.php';?>
<?php include_once 'menu.php';?>
<div class="container-fluid">
<?php foreach ($dirlist as $k=>$v) : ?>
	<?php if (is_array($v)) : ?>
	<h1><?php echo $k; ?></h1>
		<?php foreach ($v as $file) : ?>
			<?php if (!is_array($file)) : ?>
			<p><a href="<?php echo $admin_url; ?>/viewarchive/?year=<?php echo $k; ?>&file=<?php echo basename($file,'.html'); ?>">
			<?php if(key_exists($file,$filenames)) {echo $filenames[$file];} else {echo $file;} ?>
			</a></p>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
<?php endforeach; ?>
</div>
<?php include_once 'footer.php';?>
