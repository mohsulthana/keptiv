<?php $i=0; foreach ($data_berita as $value)
            	{ $i++;?>
            		<tr>
                  <td><a href="<?=base_url()?>Dashboard/DetailBerita/<?php echo $value->idArtikel ?>" style="color: #333333;"><?php echo $i;?></td></a>
            			<td><a href="<?=base_url()?>Dashboard/DetailBerita/<?php echo $value->idArtikel ?>" style="color: #333333;"><?php echo word_limiter($value->title , 8); ?></td></a>
            			<td><a href="<?=base_url()?>Dashboard/DetailBerita/<?php echo $value->idArtikel ?>" style="color: #333333;"><?php echo word_limiter($value->content , 16); ?></td></a>
                  <td><a href="<?=base_url()?>Dashboard/DetailBerita/<?php echo $value->idArtikel ?>" style="color: #333333;"><?php echo $value->name;?></td></a>
                  <td><a href="<?=base_url()?>Dashboard/DetailBerita/<?php echo $value->idArtikel ?>" style="color: #333333;"><?php echo $value->created_article;?></td></a>
                  <td><img src="<?=base_url()?>assets/uploads/<?php echo $value->image ?>" alt="" style="width: 80px;height: 80px; object-fit: cover;"></td></a>
            			<?php if ($admin == true) { ?>
            					<td style="text-align: center;"><a href="<?=base_url()?>Dashboard/ViewEditBerita/<?php echo $value->id_berita; ?>"><i class="fa fa-cog" style="font-size: 28px;" aria-hidden="true"></i></td>
            					<td style="text-align: center;"><a href="<?=base_url()?>Dashboard/DeleteBerita/<?php echo $value->id_berita; ?>"><i class="fa fa-trash" style="font-size: 28px;" aria-hidden="true"></i></td>
            			<?php } ?>
            			</tr>
            	<?php }?>

