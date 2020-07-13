<div class="search_area">
    <section class="frame searchTool">
        <form role="search" method="post" id="searchform" action="form.php">
            <div class="htitle">検索条件</div>

            <ul class="searchSub">

				<!-- <option class="seatchItemSelectOption" value="3000" <?php if($search["price"] == 3000) echo "selected"; ?>>3,000円以下</option> -->

                <li class="searchItem">
                    <div class="searchItemWrap tapflag">
                        <p class="searchItemName">価格</p>
                        <select class="searchItemSelect" name="select_price">
                            <option class="seatchItemSelectOption" value="" selected>指定しない</option>
							<option class="seatchItemSelectOption" value="<3000">3,000円以下</option>
							<option class="seatchItemSelectOption" value="<4000">4,000円以下</option>
							<option class="seatchItemSelectOption" value="<5000">5,000円以下</option>
							<option class="seatchItemSelectOption" value=">5000">5,000円以下</option>
                        </select>
                    </div>
                </li>

                <li class="searchItem">
                    <div class="searchItemWrap tapflag">
                        <p class="searchItemName">対応OS</p>
                        <select class="searchItemSelect" name="select_os">
                            <option class="seatchItemSelectOption" value="" selected>指定しない</option>
							<option class="seatchItemSelectOption" value="ios">ios</option>
							<option class="seatchItemSelectOption" value="android">android</option>
                        </select>
                    </div>
                </li>

                <li class="searchItem">
                    <div class="searchItemWrap tapflag">
                        <p class="searchItemName">送料無料</p>
                        <select class="searchItemSelect" name="select_postage">
                            <option class="seatchItemSelectOption" value="" selected>指定しない</option>
							<option class="seatchItemSelectOption" value="0">送料無料</option>
							<option class="seatchItemSelectOption" value="<=1">5000円以上で送料無料</option>
                        </select>
                    </div>
                </li>
            </ul>
            
            <br clear="all" />

            <div class="searchRadiobox">
                <div class="htitle">好きな動物</div>
                <div><input type="radio" class="searchs" name="radio_animal" id="radio_animal1" value="monkey"><label for="radio_animal1">サル</label></div>
                <div><input type="radio" class="searchs" name="radio_animal" id="radio_animal2" value="gorilla"><label for="radio_animal2">ゴリラ</label></div>
                <div><input type="radio" class="searchs" name="radio_animal" id="radio_animal3" value="chimpanzee"><label for="radio_animal3">チンパンジー</label></div>
            </div>
            
            <br clear="all" />

            <div class="searchCheckbox">
                <div class="htitle">好きな果物</div>
                <div><input type="checkbox" class="searchs" name="check_fruit[]" id="checkbox_fruit1" value="apple"><label for="checkbox_fruit1">林檎</label></div>
                <div><input type="checkbox" class="searchs" name="check_fruit[]" id="checkbox_fruit2" value="lemon"><label for="checkbox_fruit2">檸檬</label></div>
                <div><input type="checkbox" class="searchs" name="check_fruit[]" id="checkbox_fruit3" value="melon"><label for="checkbox_fruit3">メロン</label></div>
                <div><input type="checkbox" class="searchs" name="check_fruit[]" id="checkbox_fruit4" value="strawberry"><label for="checkbox_fruit4">苺</label></div>
                <div><input type="checkbox" class="searchs" name="check_fruit[]" id="checkbox_fruit5" value="watermelon"><label for="checkbox_fruit5">西瓜</label></div>
            </div>
            <br clear="all" />
            
            <div class="buttonArea">
            <button type="submit" class="isometric">
                <span class="iconback ispkt"><i class="fa fa-search"></i></span><span class="btnttl">検索する</span>
            </button>
            </div>

        </form>

    </section>
</div>