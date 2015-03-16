<?php 
class Webriti_pagination
{	function Webriti_page($curpage, $post_type_data)
	{	?>
		<div class="pagination_blog">	
			<ul><?php
				if($curpage != 1  ) {  echo '<li class="paginanext"><a href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">Prev</a>'; }
				for($i=1;$i<=$post_type_data->max_num_pages;$i++)
					{
					echo '<li><a class="'.($i == $curpage ? 'active ' : '').'" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					}
				if($i-1!= $curpage) { echo '<li class="paginanext"><a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $post_type_data->max_num_pages ? $curpage+1 : $post_type_data->max_num_pages)).'">Next</a></li>'; }
				?>
			</ul>
		</div> <?php
	} 
}
?>