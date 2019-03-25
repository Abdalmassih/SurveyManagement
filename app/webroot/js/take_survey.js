$(document).ready(function() {
	let qid = $(".q").attr("id");
	let answerIndex = $("input[name='answer']:checked").val();
	// console.log(answerIndex);
	let answers = [];
	$.ajax({
		type: "GET",
		url:
			"/SurveyManagement/cakephp/questions/getNextQuestion/" +
			qid +
			"/" +
			answerIndex,
		// data: {id: qid},
		success: function(nextQ) {
			if (nextQ.length != 0) {
				// $("form").append('<button type="button" id="prv">Previous</button>');
				console.log(nextQ);

				$("#fset").append('<button type="button" id="nxt">Next</button>');
				$("#nxt").click(() => {
					answers.push({
						qid: $(".q").attr("id"),
						answer: $("input[name='answer']:checked").val() == 0 ? "y" : "n",
						notes: $(".note").val()
					});

					$.ajax({
						type: "GET",
						url:
							"/SurveyManagement/cakephp/questions/getNextQuestion/" +
							$(".q").attr("id") +
							"/" +
							$("input[name='answer']:checked").val(),
						success: function(response) {
							if (response.length != 0) {
								// alert(response);
								response = JSON.parse(response);
								$(".q").attr("id", response.id);
								$(".q").val(response.question);
								$(".note").val("");
							} else {
								//last question
								// alert("last one!");
								$("#nxt")
									.attr("id", "submit")
									.off("click")
									.text("Submit").click(function () {
										console.log(answers)
									});
							}
						}
					});
				});
			} else {
				//this is the last question
				// $(".form").append('<button type="button" id="submit">Submit</button>');
			}
		}
	});

	// $("#submit").click(function() {});
});
