<?php
function Cosplay($text)
{
	$min=1;
    $max=5;
    $randomNumber = rand($min, $max);
    
  $response = '';
  $cosplayArray = array(1 => 'https://pbs.twimg.com/media/DQ8N3JDWsAAPOAA.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/04/1e/8f/041e8f5eef9184e320206d2abcf842c7.jpg');
  array_push($cosplayArray, 'http://www.heavymetal.com/wp-content/uploads/2015/08/jessica-nigri-teemo-erik-estrada.jpg');
  array_push($cosplayArray, 'https://disgustingmen.com/wp-content/uploads/2015/02/PnWfpXt.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/236x/14/82/26/14822629448f7d169473b6cfc8dcf5d5--joanie-brosas-ash-ketchum.jpg');
  array_push($cosplayArray, 'https://ecs7.tokopedia.net/img/product-1/2016/12/23/8945186/8945186_3f170801-ca41-4d07-bcdd-7b14b331d65c_600_800.jpg');
  array_push($cosplayArray, 'http://1.bp.blogspot.com/-MH-89q_ktH8/UGJcxB2uTnI/AAAAAAAAOZI/1_Zx7LyA6Xk/s1600/Fairy+Tail+Cosplay+by+Ginkiri+288+as+Juvia+Loxar.jpg');
  array_push($cosplayArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpJW5GFKRRUmJNClB-3RVUD3I4sn5gQ63KCSTmwNWVW_Q2bql-');
  array_push($cosplayArray, 'http://2.bp.blogspot.com/-p4fSFsI_bnQ/VOeEEvpgGfI/AAAAAAAEqjw/hyQSrRnRkxo/s1600/cosplay_03.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/e8/8e/f7/e88ef774843e253b8f7614c7ea618e0b.jpg');
  array_push($cosplayArray, 'http://cdn.ebaumsworld.com/2014/05/14/021552/84088501/84084940.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/6d/0a/be/6d0abe37d7aaa4149a6e6a110165c622.jpg');
  array_push($cosplayArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTGkkG6iyB5nazXkjxBdCxYDqY4-y3uUL2GtvX2Odvvfkk6_8a');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/e1/f5/2c/e1f52cb273ef600d96ad725a1e2167cf.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/65/04/10/650410e2b5ea10cff20474456f7375fd.jpg');
  array_push($cosplayArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcsS1dtLEyY_rXxy4fi4jReCyDOnOkkoAzr1KIGH6uTSM5hFCr');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/74/ca/47/74ca47b9adac5611de491d459a3bdb7c.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/a5/41/70/a54170cd42d7e9c06569dc3283fe431c.jpg');
  array_push($cosplayArray, 'http://femalecosplays.com/wp-content/uploads/2017/12/Scarlet-Witch-Cosplay-40.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/ef/a3/37/efa337ad3283abc7f55f373882ce3c65.jpg');
  array_push($cosplayArray, 'https://img00.deviantart.net/0cff/i/2013/284/2/1/are_you_here_as_a_patient__by_sweet_little_world-d6q1tmh.jpg');
  array_push($cosplayArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGGsYHOGc4g0o-phuRZfmOmmGDcgAtTsIPcGaEqqdbpd7WEPiC');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/2c/69/b9/2c69b9ab24d42214174c6dfb66d7cecf.jpg');
  array_push($cosplayArray, 'https://i.imgur.com/9cUU19R.jpg?1');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/2d/cd/85/2dcd85aa663e045718bb1a803a9ce8e9.jpg');
  array_push($cosplayArray, 'https://img.izismile.com/img/img8/20150411/640/hot_girls_who_make_cosplay_look_sexy_640_19.jpg');
  array_push($cosplayArray, 'https://ae01.alicdn.com/kf/HTB1Mo1oQXXXXXczXVXXq6xXFXXX2/Japanese-Cosplay-Cat-Uniform-Sexy-Costumes-Anime-Girls-Lolita-Dress-Cosplay-Lingerie-Sets-Open-Crotch-Bra.jpg_640x640.jpg');
  array_push($cosplayArray, 'https://media.alienwarearena.com/media/63a2c2b76f9d33c0e56453171502ef96.jpg');
  array_push($cosplayArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTulGw4H_KzO8Q4c27EUfzbuvsmruQe6fjBvXtMpvU7Pf-Qalnt');
  array_push($cosplayArray, 'https://ae01.alicdn.com/kf/HTB1eXRUSXXXXXbcXXXXq6xXFXXXW/Sexy-Gry-OW-D-VA-EVA-Evangelion-Cosplay-Kostium-Jednocz-ciowy-str-j-K-pielowy-Str.jpg');
  array_push($cosplayArray, 'https://imgix.ranker.com/user_node_img/50062/1001228914/original/yoko-littner-guren-photo-u1?w=650&q=50&fm=jpg&fit=crop&crop=faces');
  array_push($cosplayArray, 'https://imgix.ranker.com/user_node_img/50071/1001418701/original/dark-phoenix-photo-u1?w=650&q=50&fm=jpg&fit=crop&crop=faces');
  array_push($cosplayArray, 'https://izismile.com/img/img9/20160921/640/the_sexy_cosplay_girls_of_every_nerds_fantasy_640_18.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/ab/0a/e7/ab0ae70b11fa96592608a3c9aaf6b01d.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/e6/16/7f/e6167f25650b51df7bd4497469446f96.jpg');
  array_push($cosplayArray, 'https://images-cdn.9gag.com/photo/aDG5yXx_700b.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/7e/62/cd/7e62cd8008720e9b9d06dc0a13072537.jpg');
  array_push($cosplayArray, 'http://i.imgur.com/DgtYEqY.jpg');
  array_push($cosplayArray, 'https://pre00.deviantart.net/feff/th/pre/f/2016/231/c/6/nicorobindeviant_by_vampbeauty-dael6pf.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/86/bf/2e/86bf2e5180989dabc9771371c0eae24a.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/f2/ee/cd/f2eecdf2a31789d357786e22f36f421a.jpg');
  array_push($cosplayArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE6p7USl8C6_yU8L7RF1nyucY5Jy-a7Xdg9wCslK3pPU8VfLvM');
  array_push($cosplayArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaqbZ40icCROy0EyR8Pq7txtJAgbm63lEaZhS7fAOpql-fv5ka');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/bd/7b/31/bd7b319818ab8c89061f962a76799e64.jpg');
  array_push($cosplayArray, 'https://warosu.org/data/cgl/img/0064/68/1354657292748.jpg');
  array_push($cosplayArray, 'http://www.geekxgirls.com/images/poisonivy53/poison-ivy-cosplay-03.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/d6/9c/72/d69c724b66e2888589eab5aa7fd570b1.jpg');
  array_push($cosplayArray, 'https://i.pinimg.com/originals/1d/b8/d6/1db8d66a44cd11317e9e72b414c7e4d9.jpg');
  array_push($cosplayArray, 'https://creative-ads.org/wp-content/uploads/2014/05/Hot-Velma-Cosplay-by-Alithia-2.jpg');
  array_push($cosplayArray, 'https://steemitimages.com/0x0/https://cdn.steemitimages.com/DQmd1J8nwP27EAvywSPdjwLqiGy84E3DQv7PxpM3vH3dUL7/steampunk%20girl.jpg');
  

  $cosplayGifArray = array(1 => 'http://tse4.mm.bing.net/th?id=OGC.0be768b0ee23e711e3ab49a6c067731a&pid=1.7&rurl=http://img1.thatpervert.com/pics/post/porn--cosplay-cosplay-porn-4374455.gif&ehk=/wEM0CzPo9GupV7grVCJig');
  array_push($cosplayGifArray, 'https://cdn4.images.motherlessmedia.com/images/10A7682.gif?fs=opencloud');
  array_push($cosplayGifArray, 'https://i.kym-cdn.com/photos/images/newsfeed/000/477/664/84b.gif');
  array_push($cosplayGifArray, 'https://images.sex.com/images/pinporn/2015/12/07/300/14480498.gif');
  array_push($cosplayGifArray, 'https://alexsnowdog.files.wordpress.com/2017/06/cosplay11.gif');
  array_push($cosplayGifArray, 'https://choualbox.com/Img/146451129647.gif');
  array_push($cosplayGifArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNbUmWzvdrBNfTVjmFu6g3KZU5Zn0mA7T5HPiaNGyRk-tUyVWC');
  array_push($cosplayGifArray, 'https://i.imgur.com/Z6fZvP3.gif?noredirect');
  array_push($cosplayGifArray, 'https://thumbs.gfycat.com/LankyClearDouglasfirbarkbeetle-size_restricted.gif');
  array_push($cosplayGifArray, 'http://xxxpicz.com/xxx/velma-dinkley-boobs-porn-scooby-doo-velma-ass-gif.gif');
  array_push($cosplayGifArray, 'https://images.sex.com/images/pinporn/2017/01/14/300/17216170.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/58/da/60/58da60052d91d54dffb0d81f7fa850c9.gif');
  array_push($cosplayGifArray, 'https://i.makeagif.com/media/8-14-2015/ShTahr.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/ae/f9/a5/aef9a570d549d803ff829daac8a396c1.gif');
  array_push($cosplayGifArray, 'https://i.imgur.com/dEpmOPI.jpg');
  array_push($cosplayGifArray, 'http://hot-cosplaygirls.com/wp-content/uploads/2015/01/Super-Mary-Face17.gif');
  array_push($cosplayGifArray, 'https://blog.planete-nextgen.com/wp-content/uploads/2015/10/ezgif.com-optimize.gif');
  array_push($cosplayGifArray, 'https://www.maxim.com/.image/t_share/MTUwOTAyNjIwNDU2NzU3MDgx/tumblr_lyhfkrwyrf1r69bfqo1_500.gif');
  array_push($cosplayGifArray, 'https://lh3.googleusercontent.com/-Yg3iw-3im4Y/VKnVYxmdhgI/AAAAAAAAxDQ/BXTj85VGkGs/w426-h638/cute-asian-cosplay-girl-gif-1777980.gif');
  array_push($cosplayGifArray, 'https://lh3.googleusercontent.com/-IGpMXFR6Fgg/VWVd8dcm0BI/AAAAAAAAA7I/9tcOlZKuIQE/w360-h193-n-rw/bianca%2Bbeauchamp%2Bharley%2Bquinn%2B1.gif');
  array_push($cosplayGifArray, 'https://media.giphy.com/media/q5R3a7Vqgrl04/giphy.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/22/71/f5/2271f51c936a6363d640883711218380.gif');
  array_push($cosplayGifArray, 'http://lolhehehe.com/wp-content/uploads/2018/02/eewewewew.gif');
  array_push($cosplayGifArray, 'https://images.sex.com/images/pinporn/2017/05/14/300/17763223.gif');
  array_push($cosplayGifArray, 'https://foro.putalocura.com/proxy.php?image=http%3A%2F%2F24.media.tumblr.com%2F0116628cbed04dc98cf398494083c009%2Ftumblr_mhexphQNuz1rimwgjo1_1280.gif&hash=bdc7f592d37b142ef3195dd7af142a51');
  array_push($cosplayGifArray, 'https://ugc.kn3.net/i/760x/http://www.23hq.com/theory23hq/photo/17161033/original');
  array_push($cosplayGifArray, 'http://gosidework.com/423/27baf6f345b168b95cb36ca9b914f444.gif');
  array_push($cosplayGifArray, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJoxGQFsRexycsDjfOeFSBvbb3gqBsushdDc8N1kVmWxVCq1yb');
  array_push($cosplayGifArray, 'https://www.bunnylust.com/sexy-pattycake-naked-leia-gifs/2.gif');
  array_push($cosplayGifArray, 'https://i.kym-cdn.com/photos/images/original/000/477/740/7d7.gif');
  array_push($cosplayGifArray, 'http://www.daidegasforum.com/images2/349/sexy-nurse-cosplay-gif.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/06/a4/15/06a415d1a10fd004b30c406d7273e7a4.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/15/f5/a7/15f5a7d775217a8920b7bbaba26a7f2f.gif');
  array_push($cosplayGifArray, 'https://i.imgur.com/WJRHrd1.gif');
  array_push($cosplayGifArray, 'https://lh3.googleusercontent.com/-E1hC2vHHta4/V9BF252WUEI/AAAAAAADtZo/Jex_byeJZ-Ux3qQ4PpyWBFBjqwJMOg95wCJoC/w506-h750/giphy-downsized-large.gif');
  array_push($cosplayGifArray, 'https://i.redd.it/ve4v2t4tdwox.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/ba/7c/d6/ba7cd626519b7b960057c8676bc00f34.gif');
  array_push($cosplayGifArray, 'https://thumbs.gfycat.com/BestBrownCoot-small.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/10/6a/79/106a797dd220ce01622c6fdc9cf107df.gif');
  array_push($cosplayGifArray, 'https://steamusercontent-a.akamaihd.net/ugc/487893695360056820/F6F558F448CA04ECB7B83D7A1715BF868801F657/');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/07/64/94/07649423b800d2045e3e2fc0dfda9d3d.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/5d/25/3b/5d253bd9338577938bcb2cd9b9a38bff.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/45/40/2c/45402c1b8991b5e50c986f1df7964ee9.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/9f/a7/c5/9fa7c50da7781878c5ddeb9b0e834b5a.gif');
  array_push($cosplayGifArray, 'http://nsfw.yourgeekgirls.su/archive/cosplay/Molly-Mfc/DC/harley-quinn/yourgeekgirls.su_cosplay_comics_DC_harley-quinn_attributes_boobs_redhead_nsfw_without-underwear_mood_sexy_shameless_photo_hair_fetish_Molly-Mfc_2555_0_58afafcb3caa1.gif');
  array_push($cosplayGifArray, 'https://i.makeagif.com/media/8-14-2015/ShTahr.gif');
  array_push($cosplayGifArray, 'https://i.pinimg.com/originals/ae/f9/a5/aef9a570d549d803ff829daac8a396c1.gif');
  array_push($cosplayGifArray, 'https://i.imgur.com/dEpmOPI.jpg');
  array_push($cosplayGifArray, 'http://hot-cosplaygirls.com/wp-content/uploads/2015/01/Super-Mary-Face17.gif');
  array_push($cosplayGifArray, 'https://blog.planete-nextgen.com/wp-content/uploads/2015/10/ezgif.com-optimize.gif');
    
  $min=1;
  $max=50;
  $randomNumber = rand($min, $max);
  //shuffle the array
  shuffle($cosplayArray);
  shuffle($cosplayGifArray);
  
  // devo cercare una gif?
  if(strpos($text, 'gif') !== false)
    $response = $cosplayGifArray[$randomNumber];
  else
    $response = $cosplayArray[$randomNumber];
  
  return $response;
}
?>