$("#deleteModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var question_id = button.data("question_id");
    var modal = $(this);
    modal
        .find(".modal-body #deleteForm")
        .attr("action", "/questionnaires/" + question_id);
});

$("#shareModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var question_url = button.data("question_url");
    var modal = $(this);
    modal.find(".modal-body #url").val(question_url);
});
