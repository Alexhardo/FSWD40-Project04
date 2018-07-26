console.log(tempData);
console.log(currentUser);
let label_class = '';
for (let i = 0; i < currentUser.length; i++) {
    $('.profile-widget-text:eq(0)').append(`
      <p>${currentUser[i].first_name} ${currentUser[i].last_name}</p>
      <p>You are in a ${currentUser[i].name}</p>
      <p>Tickets asked: 13</p>
    `)

    $('.profile-widget-avatar:eq(0)').html(`
    <img style="width: 100%;border-radius: 50%;" src="../../images/avatars/${currentUser[i].img}">
    `).css({
        'background-color': 'transparent'
    })

    $('#new-ticket').append(`
        <form action="test_new_ticket_form.php" method="get">
        <input type="hidden" name="user_id" value="${currentUser[i].user_id}">
        <input type="hidden" name="course_name" value="${currentUser[i].name}">
        <input type="hidden" name="course_id" value="${currentUser[i].course_id}">
        <input type="hidden" name="fk_course_id" value="${currentUser[i].fk_course_id}">
        <button type="submit" class="btn btn-warning offset-lg-3" style="border: 1px solid #7634C4;">Create a Ticket</button>
        </form>
    `)
  }
for (let i = 0; i < tempData.length; i++) {
    if (tempData[i].ticket_status === "taken") {
        let datestamp = Date.parse(tempData[i].open_date_time)
        let date_ago = moment(datestamp).fromNow()
        label_class = "green-label"
        $(`.ticket-container:eq(${0})`).append(`
        <div class="row">
                <div class="ticket-box col-lg-6 col-md-6 col-sm-9 col-9 offset-lg-3 offset-md-3">
                    
                    <div class="${label_class}"></div>
                    <p class="ticket-date">Posted ${date_ago}</p>
                    <p class="ticket-title"><strong>Title: </strong>${tempData[i].title}</p>
                    <p class="ticket-topic">${tempData[i].name}</p>
                    <button class="expand-ticket"><i class="fas fa-angle-double-down down"></i></button>
                    <div class="panel">
                        <p><strong>Description: </strong><br>${tempData[i].description}</p>
                    </div>
                </div>
                <div class="ticket-author col-lg-1 col-md-1 col-sm-1 col-1">
                    <div class="avatar text-center ml-auto mr-auto">
                        <img style="width: 100%;border-radius: 50%;" src="../../images/avatars/${tempData[i].img}">
                    </div>
                    <p class="text-center">${tempData[i].student}</p>
                </div>
            </div>
        `)
        $(`.avatar`).css({
            'background-color': 'transparent'
        })
    } 
}

for (let i = 0; i < tempData.length; i++) {
    
    if (tempData[i].ticket_status === "open") {
        let datestamp = Date.parse(tempData[i].open_date_time)
        let date_ago = moment(datestamp).fromNow()
        label_class = "orange-label"
        $(`.ticket-container:eq(${0})`).append(`
        <div class="row">
                <div class="ticket-box col-lg-6 col-md-6 col-sm-9 col-9 offset-lg-3 offset-md-3">
                    
                    <div class="${label_class}"></div>
                    <p class="ticket-date">Posted ${date_ago}</p>
                    <p class="ticket-title"><strong>Title: </strong>${tempData[i].title}</p>
                    <p class="ticket-topic">${tempData[i].name}</p>
                    <button class="expand-ticket"><i class="fas fa-angle-double-down down"></i></button>
                    <div class="panel">
                        <p><strong>Description: </strong><br>${tempData[i].description}</p>
                    </div>
                </div>
                <div class="ticket-author col-lg-1 col-md-1 col-sm-1 col-1">
                    <div class="avatar text-center ml-auto mr-auto">
                    <img style="width: 100%;border-radius: 50%;" src="../../images/avatars/${tempData[i].img}">
                    </div>
                    <p class="text-center">${tempData[i].student}</p>
                </div>
            </div>
        `)
        $(`.avatar`).css({
            'background-color': 'transparent'
        })
    } 
}

var accordions = document.querySelectorAll("button.expand-ticket");
for (var i = 0; i < accordions.length; i++) {
accordions[i].onclick = function() {
    this.nextElementSibling.classList.toggle("show");
    $(this).toggleClass("rotate-button");
};
}
// })

// else if(tempData[i].ticket_status === "open") {
//     label_class = "orange-label"
// }