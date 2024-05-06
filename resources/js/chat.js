import './bootstrap';

(function ($) {

    let per_page = 30;
    let currentPage = 1;

    function getMessages(page, perPage) {
        $.ajax({
            method: 'get',
            url: messages.list_url + `?page=${page}&per_page=${perPage}`,
            headers: {
                'x-api-key': "base64:9Vc1bTsIjCszuRxH324Xlo/RXABWJL/uRRZ1gPFfYLg=",
            },
            success: function (response) {
                let messages = response.data;
                for (let i in messages) {
                    let message = messages[i];
                    addMessage(message, true);
                }

                total=response.total;
                // Focus on the first message of the newly loaded page
                focusOnFirstMessage();
            }
        });
    }

    let total;
    function focusOnFirstMessage() {
        let firstNewMessage = $('.message').eq(28);
        $('#messages').scrollTop(firstNewMessage.offset().top)
    }

    $(document).ready(function () {
        getMessages(currentPage, per_page);

        $('#messages').on('scroll', function () {
            if ($(this).scrollTop() === 0 && total - per_page * currentPage >0 ) {
                currentPage++;
                getMessages(currentPage, per_page );
            }
        });
    });



    function addMessage(message, prepend) {
        let receiverHtml = `<div class="chat-message-left pb-4 message align-items-start">
                                        <div>
                                            <img src="${message.sender.user_image}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                            <div class="text-light-emphasis small text-nowrap mt-2">${message.sent_at}</div>
                                        </div>
                                        <span>

                            <div class="font-weight-bold thr_color mb-1">${message.sender.name}</div>

                       <div class="flex-shrink-1 bg-dark-subtle rounded_message message_body p-2   ">


                                           ${message.body}

                                        </div>


                                    </div>`;
        let senderHtml = `<div class="chat-message-right pb-2 message focus  align-items-start">
                                         <div>
                                            <img src="${message.sender.user_image}"
                                                 class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                            <div class="text-light-emphasis small text-nowrap mt-2">${message.sent_at}</div>
                                          </div>




                                                                                <div class="flex-shrink-1 bg-primary rounded_message message_body p-2   ">

                                                                                                                        ${message.body}




                                        </div>


                                    </div>`;

        if (user.id == message.sender.id) {

            if (prepend) return $('#messages').prepend(senderHtml);

            $('#messages').append(senderHtml);


        } else {

            if (prepend) return $('#messages').prepend(receiverHtml);

            $('#messages').append(receiverHtml);
        }

        $('#messages').scrollTop($('#messages')[0].scrollHeight);

    }

    function send(message) {
        $.ajax({
            method: 'post',
            headers: {
                'x-api-key': "base64:9Vc1bTsIjCszuRxH324Xlo/RXABWJL/uRRZ1gPFfYLg=",
            },
            url: messages.store_url,
            data: {
                _token: csrf_token,
                body: message
            },
            success: function (response) {
                addMessage(response, false)
            }

        })

    }




    let ch = Echo.join(`classroom.message.${classroom_id}`)

        .here((users) => {
            for (let i in users) {
                let user = users[i];
                $('#online_users').append(
                    ` <div class="d-flex align-items-start m-4" id="user-${user.id}">
                                             <img src="${user.user_image}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                             <div class="flex-grow-1 ms-4 thr_color">
                                                 ${user.name}
                                                 <div class="small"><span class="text-success " id="typing-${user.id}">Online</span></div>
                                             </div>
                                         </div>`
                )
            }
        })
        .joining((user) => {


            $('#online_users').append(
                ` <div class="d-flex align-items-start m-4" id="user-${user.id}">
                                             <img src="${user.user_image}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                             <div class="flex-grow-1 ms-4 thr_color">
                                                 ${user.name}
                                                 <div class="small"><span class="text-success " id="typing-${user.id}">Online</span></div>
                                             </div>
                                         </div>`
            )

        })

        .leaving((user) => {
            $(`#user-${user.id}`).remove();
        }).listen('.New Message', function (event) {
            addMessage(event)
        }).listenForWhisper('start-typing', (event) => {
            $(`#typing-${event.id}`).html(` is typing..`);
        }).listenForWhisper('stop-typing', (event) => {
            $(`#typing-${event.id}`).html(`Online`);
        });


    let typing = false;
    let timer;

    $('#message-form textarea').on('keyup', function (event) {

        if (!typing) {
            ch.whisper('start-typing', {
                name: user.name,
                id: user.id

            });
        }
        typing = true;

        if (timer) clearTimeout(timer)
        timer = setTimeout(() => {
            ch.whisper('stop-typing', {
                name: user.name,
                id: user.id
            });
            typing = false;
        }, 2000)


    });


    $('#message-form').on('submit', function (e) {
        e.preventDefault();
        send($(this).find('textarea').val());

        $(this).find('textarea').val('');
        ch.whisper('stop-typing', {
            name: user.name,
            id: user.id
        });
        typing = false;
    })
})(jQuery)


