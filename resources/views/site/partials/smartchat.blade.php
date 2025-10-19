<!-- resources/views/layouts/bot.blade.php -->
<script>
    var botmanWidget = {
        chatServer: "{{ url('/botman') }}", // only this is needed
        title: '🤖 Smart Support Bot',
        introMessage: '✋ أهلاً! اسألني أي سؤال من الأسئلة الشائعة.',
        mainColor: '#007bff',
        bubbleBackground: '#007bff',
        placeholderText: 'اكتب سؤالك هنا...',
        aboutText: '',
        aboutLink: '',
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>

<style>
    /* Force chat to appear above everything */
    #botmanWidgetRoot,
    #botmanWidget,
    .botman-chat-button {
        position: fixed !important;
        bottom: 20px !important;
        right: 20px !important;
        z-index: 999999 !important;
    }

    .botman-chat-widget {
        z-index: 999999 !important;
    }
</style>