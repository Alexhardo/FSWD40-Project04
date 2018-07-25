let label_class = '';
for (let i = 0; i < tempData.length; i++) {
    if (tempData[i].ticket_status === "taken") {
    label_class = "green-label"
    $(`.ticket-container:eq(${0})`).append(`
    <div class="row">
            <div class="ticket-box col-lg-6 col-md-6 col-sm-9 col-9 offset-lg-3 offset-md-3">
                <div class="${label_class}"></div>
                <p class="ticket-date">Posted 45 minutes ago.</p>
                <p class="ticket-title"><strong>Title: </strong>${tempData[i].title}</p>
                <p class="ticket-topic">${tempData[i].name}</p>
                <button class="expand-ticket"><i class="fas fa-angle-double-down down"></i></button>
                <div class="panel">
                    <p><strong>Description: </strong><br>${tempData[i].description}</p>
                    <div class="row">
                    <form action="../Update_Ticket/updateticket.php?" method="get" class="col-lg-3 offset-lg-5">
                        <input type="hidden" name="ticketid" value="${tempData[i].ticket_id}">
                        <input type="hidden" name="status" value="taken">
                        <button type="submit" class="btn btn-warning">Take the ticket</button>
                    </form>
                    <form action="../Update_Ticket/updateticket.php?" method="get" class="col-lg-3 ml-2">
                        <input type="hidden" name="ticketid" value="${tempData[i].ticket_id}">
                        <input type="hidden" name="status" value="closed">
                        <button type="submit" class="btn btn-success">Close the ticket</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="ticket-author col-lg-1 col-md-1 col-sm-1 col-1">
                <div class="avatar text-center ml-auto mr-auto"></div>
                <p class="text-center">${tempData[i].student}</p>
            </div>
        </div>
    `)
    }
}

for (let i = 0; i < tempData.length; i++) {
    if (tempData[i].ticket_status === "open") {
    label_class = "orange-label"
    $(`.ticket-container:eq(${0})`).append(`
    <div class="row">
            <div class="ticket-box col-lg-6 col-md-6 col-sm-9 col-9 offset-lg-3 offset-md-3">
                <div class="${label_class}"></div>
                <p class="ticket-date">Posted 45 minutes ago.</p>
                <p class="ticket-title"><strong>Title: </strong>${tempData[i].title}</p>
                <p class="ticket-topic">${tempData[i].name}</p>
                <button class="expand-ticket"><i class="fas fa-angle-double-down down"></i></button>
                <div class="panel">
                    <p><strong>Description: </strong><br>${tempData[i].description}</p>
                    <div class="row">
                    <form action="../Update_Ticket/updateticket.php?" method="get" class="col-lg-3 offset-lg-5">
                        <input type="hidden" name="ticketid" value="${tempData[i].ticket_id}">
                        <input type="hidden" name="status" value="taken">
                        <button type="submit" class="btn btn-warning">Take the ticket</button>
                    </form>
                    <form action="../Update_Ticket/updateticket.php?" method="get" class="col-lg-3 ml-2">
                        <input type="hidden" name="ticketid" value="${tempData[i].ticket_id}">
                        <input type="hidden" name="status" value="closed">
                        <button type="submit" class="btn btn-success">Close the ticket</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="ticket-author col-lg-1 col-md-1 col-sm-1 col-1">
                <div class="avatar text-center ml-auto mr-auto"></div>
                <p class="text-center">${tempData[i].student}</p>
            </div>
        </div>
    `)
    }
}

var accordions = document.querySelectorAll("button.expand-ticket");
for (var i = 0; i < accordions.length; i++) {
accordions[i].onclick = function() {
    this.nextElementSibling.classList.toggle("show");
    $(this).toggleClass("rotate-button");
};
}
