<?php

use Tests\TestCase;

class MessengerSendTest extends TestCase
{
    public function testSendMessageWithBr(): void
    {
        $message = "سلام.خوبین" . "<br>" . "چه خبر<p>";

        $messageEitaa = str_replace(['<p>', '</p>'], '', $message);
        $this->assertEquals("سلام.خوبین" . "چه خبر<p>", $messageEitaa);
        $messageTelegram = nl2br(str_replace(['<br>'], '\n\r', $messageEitaa), false);


    }

}
