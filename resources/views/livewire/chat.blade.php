
    <!-- chat section -->
<div>
    <button class="bg-slay text-gray-50 py-3 px-5 cursor-pointer fixed bottom-10 right-14 w-72 text-2xl rounded" onclick="openForm()">
        Chat <span class="fas fa-comments text-2xl"></span>
    </button>

    <div class="hidden fixed bottom-0 right-14 z-50 border-4 border-solid border-gray-400" id="myForm">
        <form action="" class="form-container">
        <h1>Chat</h1>

        <div class="flex justify-between p-1">
            <label for="msg"><b>Message</b></label>
            <span class="fas fa-times text-xl cursor-pointer text-red-500" onclick="closeForm()"></span>
        </div>
        <textarea placeholder="Type message.." name="msg" required></textarea>

        <button type="submit" class="chat-btn">Send</button>
        </form>
    </div>
</div>
      <!-- chat section -->