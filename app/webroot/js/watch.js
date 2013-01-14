$(function() {
	$(".watchButton").live(
			"click",
			function() {
				// ページのクラス名から目標IDを取得
				var classArray = $(this).attr("class").split(" ");

				// watch_enabledの場合のみ状態でなければ判定
				if (classArray[2] != "watch_enabled") {
					return false;
				}
				// 操作対象となるボタンを保持
				var button = $(this);
				var aimId = classArray[1];
				var screen_name = $("#screen_name" + aimId).text();
				$.ajax({
					type : "POST",
					url : "/watch/?aim=" + aimId,
					data : "text",
					success : function(result) {
						if (result.result == "noLogin") {
							// ログインしていない場合
							$.confirm({
								'title' : 'ログインしてください',
								'message' : '注目するにはログインする必要があります。',
								'buttons' : {
									'閉じる' : {
										'class' : 'blue'
									}
								}
							});
						} else if (result.result == true) {
							// 登録が正常に行われた場合
							button.removeClass("watch_enabled");
							button.addClass("watch_disabled");
							var beforeCount = $("#watch" + aimId).text();
							beforeCount++;
							$("#watch" + aimId).text(beforeCount);
							// 該当ユーザがログインしていた場合、コンファーム出してTwitterポストするかどうか確認
							$.confirm({
								'title' : 'Twitterへ投稿',
								'message' : screen_name
										+ 'さんの目標を注目しました。twitterでつぶやきますか？',
								'buttons' : {
									'はい' : {
										'class' : 'blue',
										'action' : function() {
											$.ajax({
												type : "POST",
												url : "/twitter/tweetAim?aim="
														+ aimId
														+ "&screen_name="
														+ screen_name,
												data : "text",
												success : function(result) {
													// TODO
													// 正常につぶやいたときはダイアログでも出す？
												},
												error : function(error) {
													alert(error);
												}
											});
										}
									},
									'いいえ' : {
										'class' : 'gray',
										'action' : function() {
										} // Nothing to do in this case. You
									// can as well omit the action
									// property.
									}
								}
							});
						} else {
							// 何らかの理由でデータが登録出来なかった場合
							alert("正常に注目情報が登録出来ませんでした。");
						}
					}
				});
			});
});
