<div class="control-bar">
<ul>
    <li class="sort_button"><button class="btn sort active" data-sort="popular:desc">点数順</button></li>
    <li class="sort_button"><button class="btn sort" data-sort="price:asc">安い順</button></li>
    <li class="sort_button"><button class="btn sort" data-sort="price:desc">高い順</button></li>
</ul>
</div>
<br clear="all" />


<div class="searchResultList">
    <?php foreach($result as $elm){ ?>
        <!-- -->
        <div class="mix category-1" data-popular="<?php echo $elm["point"]; ?>" data-price="<?php echo $elm[select_price]; ?>">
            <div class="resultBox">
                <div class="resultInner">
                  <div class="layoutFullWidth clearfix">
                    <p class="layoutLeft"><a href="<?php echo $elm["url"]; ?>"><img width="80" height="80" src="<?php echo $elm["img"]; ?>"></a></p>
                    <div class="layoutRight">
                      <div class="layoutNameArea clearfix">
                        <a href="<?php echo $elm["url"]; ?>"><h3 class="resultBox_name"><i class="fa fa-hand-o-right" aria-hidden="true"></i><?php echo $elm["name"]; ?></h3></a>
                      </div>

                      <p class="resultPoint"><span class="resultPoint_text"><?php echo $elm["txt"]; ?></span></p>
                        <p class="detailTextLink"><a href="<?php echo $elm["url"]; ?>">詳細を見る<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></p>
                    </div>
                  </div>
                  
                    <?php
                        if($elm["check_fruit"] != ""){
                            $tagAr = array();
                            if(strpos($elm["check_fruit"], ";") !== false){
                                $tagAr = explode(";",$elm["check_fruit"]);
                            }else{
                                $tagAr[] = $elm["check_fruit"];
                            }

                            echo '<ul class="tag layouttag clearfix">';
                            foreach($tagAr as $tag){
                                echo '<li class="tag_item match">' . $tag . '</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                  
                  <table cellpadding="0" cellspacing="0" class="resultinTable">
                    <tbody>
<!--
                      <tr>
                        <td class="resultinTable_head">価格</td>
                        <td class="resultinTable_body">-</td>
                        <td class="resultinTable_head">返金保証/無料体験版</td>
                        <td class="resultinTable_body">-</td>
                      </tr>
-->

                        

                      <tr>
                        <td class="resultinTable_head">評価</td>
                        <td class="resultinTable_body"><div class="resultBox_point"><span class="no"><?php echo $elm["point"]; ?></span>点</div></td>
                      </tr>

                      <tr>
                        <td class="resultinTable_head">種類</td>
                        <td class="resultinTable_body">
                        <?php echo $elm["textarea1"]; ?>
                        </td>
                      </tr>
                      <tr>
                        <td class="resultinTable_head">価格</td>
                        <td class="resultinTable_body"><?php echo number_format($elm[select_price]); ?>円</td>
                      </tr>
                      <tr>
                        <td class="resultinTable_head">対応OS</td>
                        <td class="resultinTable_body"><?php echo $elm["select_os"]; ?></td>
                      </tr>
                      <tr>
                        <td class="resultinTable_head">動物</td>
                        <td class="resultinTable_body"><?php echo $elm["radio_animal"]; ?></td>
                      </tr>
                      <tr>
                        <td class="resultinTable_head">説明</td>
                        <td class="resultinTable_body">
                        <p>
                        <?php echo $elm["textarea2"]; ?>
                        <p>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                 
                <div class="sendButtonBox">
                  <a href="<?php echo $elm["url"]; ?>" class="sendButton">詳細を見る</a>
                </div>
            </div>

        </div>
        <!-- -->
    <?php } ?>
</div>


