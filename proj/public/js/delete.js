function deleteRequest(id) {
    if (confirm("Are you sure you want to delete this request?")) {
        $.ajax({
            type: "POST",
            url: "delete_request.php",
            data: { id: id },
            success: function () {
                location.reload();
            },
            error: function () {
                alert("Error deleting request.");
            },
        });
    }
}