<?php

include 'gitphptest.php';

$repo = new GitPHPTest();
$repository = $repo->getRepo('joyent', 'node');
$commits = $repo->getRepoCommits('joyent', 'node');

echo "<pre>";
//print_r($commits);
echo "</pre>";

$numCommits = count($commits);

?>

<style>
	table, th, td {
		border: 1px solid #333;
		border-collapse: collapse;
	}
	.blueRow{
		background-color: #E6F1F6;
	}
	
</style>
<table>
	<tr>
		<th>Commit</th>
		<th>Author</th>
		<th>Message</th>
		<th>Date</th>
	</tr>
<?php for ($i=0; $i < $numCommits; $i++): ?>
	<?php if(is_numeric(substr($commits[$i]['sha'], -1))): ?>
		<?php $classBlueRow = ' class="blueRow"'; ?>
	<?php else: ?>
		<?php $classBlueRow = '' ?>
	<?php endif; ?> 
	<tr<?php echo $classBlueRow; ?>>
		<td>
			<?php echo $commits[$i]['sha'] ?>
		</td>
		<td>
			<?php echo $commits[$i]['commit']['author']['name'] ?>
		</td>
		<td>
			<?php echo $commits[$i]['commit']['message'] ?>
		</td>
		<td>
			<?php echo $commits[$i]['commit']['author']['date'] ?>
		</td>
	</tr>
<?php endfor; ?>
</table>

