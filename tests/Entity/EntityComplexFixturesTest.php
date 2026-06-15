<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Entity;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Entity as Ent;
use AndrewGos\TelegramBot\Enum as Enums;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
class EntityComplexFixturesTest extends TestCase
{
    private ClassBuilder $classBuilder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->classBuilder = new ClassBuilder();
    }

    public function testMessageEntitiesDeserialization(): void
    {
        $json = file_get_contents(__DIR__ . '/../fixtures/complex/sendMessage_entities_real.json');
        $data = json_decode($json, true, flags: JSON_THROW_ON_ERROR);

        $message = $this->classBuilder->build(Ent\Message::class, $data['result']);

        $this->assertInstanceOf(Ent\Message::class, $message);
        $this->assertSame(185, $message->getMessageId());
        $this->assertSame(1_781_472_126, $message->getDate());

        $this->assertSame(123, $message->getFrom()->getId());
        $this->assertTrue($message->getFrom()->getIsBot());
        $this->assertSame('TestMaiSurveyBot', $message->getFrom()->getFirstName());

        $this->assertSame(234, $message->getChat()->getId());
        $this->assertSame(Enums\ChatTypeEnum::Private, $message->getChat()->getType());

        $entities = $message->getEntities();
        $this->assertCount(28, $entities);

        $this->assertSame(Enums\MessageEntityTypeEnum::Bold, $entities[0]->getType());
        $this->assertSame(0, $entities[0]->getOffset());
        $this->assertSame(10, $entities[0]->getLength());

        $this->assertSame(Enums\MessageEntityTypeEnum::Italic, $entities[1]->getType());

        // text_link at offset 160 (index 18)
        $this->assertSame(Enums\MessageEntityTypeEnum::TextLink, $entities[18]->getType());
        $this->assertSame('http://www.example.com/', $entities[18]->getUrl()?->getUrl());

        // date_time at offset 199 (index 19)
        $this->assertSame(Enums\MessageEntityTypeEnum::DateTime, $entities[19]->getType());
        $this->assertSame('wDT', $entities[19]->getDateTimeFormat());

        // pre with python (index 25)
        $this->assertSame(Enums\MessageEntityTypeEnum::Pre, $entities[25]->getType());
        $this->assertSame('python', $entities[25]->getLanguage());

        // Overlapping entities at offset 61 (indices 6 and 7)
        $this->assertSame(Enums\MessageEntityTypeEnum::Bold, $entities[6]->getType());
        $this->assertSame(61, $entities[6]->getOffset());
        $this->assertSame(Enums\MessageEntityTypeEnum::Italic, $entities[7]->getType());
        $this->assertSame(61, $entities[7]->getOffset());

        // Overlapping entities at offset 73 (indices 8, 9, 10) - bold + italic + strikethrough
        $this->assertSame(Enums\MessageEntityTypeEnum::Bold, $entities[8]->getType());
        $this->assertSame(73, $entities[8]->getOffset());
        $this->assertSame(Enums\MessageEntityTypeEnum::Italic, $entities[9]->getType());
        $this->assertSame(73, $entities[9]->getOffset());
        $this->assertSame(Enums\MessageEntityTypeEnum::Strikethrough, $entities[10]->getType());
        $this->assertSame(73, $entities[10]->getOffset());
    }

    public function testRichMessageFullDeserialization(): void
    {
        $json = file_get_contents(__DIR__ . '/../fixtures/complex/sendRichMessage_full_real.json');
        $data = json_decode($json, true, flags: JSON_THROW_ON_ERROR);

        $message = $this->classBuilder->build(Ent\Message::class, $data['result']);

        $this->assertSame(184, $message->getMessageId());
        $richMessage = $message->getRichMessage();
        $this->assertInstanceOf(Ent\RichMessage::class, $richMessage);

        $blocks = $richMessage->getBlocks();
        // Block-by-block structure verification
        $this->assertCount(43, $blocks);

        // Block 0: RichBlockParagraph with mixed RichText types
        $paragraph = $blocks[0];
        $this->assertInstanceOf(Ent\RichBlockParagraph::class, $paragraph);
        $text = $paragraph->getText();
        $this->assertCount(15, $text);
        $this->assertInstanceOf(Ent\RichTextBold::class, $text[0]);
        $this->assertIsString($text[1]);
        $this->assertInstanceOf(Ent\RichTextItalic::class, $text[4]);
        $this->assertInstanceOf(Ent\RichTextItalic::class, $text[6]);
        $this->assertInstanceOf(Ent\RichTextStrikethrough::class, $text[8]);
        $this->assertInstanceOf(Ent\RichTextCode::class, $text[10]);
        $this->assertInstanceOf(Ent\RichTextMarked::class, $text[12]);
        $this->assertInstanceOf(Ent\RichTextSpoiler::class, $text[14]);

        // Block 1: RichBlockParagraph with URL, email, phone, etc.
        $paragraph2 = $blocks[1];
        $text2 = $paragraph2->getText();
        $this->assertCount(28, $text2);
        $this->assertInstanceOf(Ent\RichTextUrl::class, $text2[0]);
        $this->assertInstanceOf(Ent\RichTextEmailAddress::class, $text2[2]);
        $this->assertInstanceOf(Ent\RichTextPhoneNumber::class, $text2[4]);
        $this->assertInstanceOf(Ent\RichTextDateTime::class, $text2[8]);
        $this->assertInstanceOf(Ent\RichTextMathematicalExpression::class, $text2[10]);
        $this->assertInstanceOf(Ent\RichTextHashtag::class, $text2[12]);
        $this->assertInstanceOf(Ent\RichTextCashtag::class, $text2[14]);
        $this->assertInstanceOf(Ent\RichTextBotCommand::class, $text2[24]);
        $this->assertInstanceOf(Ent\RichTextMention::class, $text2[26]);

        // Heading 1-6
        $this->assertInstanceOf(Ent\RichBlockSectionHeading::class, $blocks[2]);
        $this->assertSame(1, $blocks[2]->getSize());
        $this->assertInstanceOf(Ent\RichBlockSectionHeading::class, $blocks[3]);
        $this->assertSame(2, $blocks[3]->getSize());
        $this->assertInstanceOf(Ent\RichBlockSectionHeading::class, $blocks[7]);
        $this->assertSame(6, $blocks[7]->getSize());

        // Pre with language
        $this->assertInstanceOf(Ent\RichBlockPreformatted::class, $blocks[9]);
        $this->assertSame('python', $blocks[9]->getLanguage());

        // Divider
        $this->assertInstanceOf(Ent\RichBlockDivider::class, $blocks[10]);

        // List (unordered)
        $this->assertInstanceOf(Ent\RichBlockList::class, $blocks[11]);

        // List (ordered)
        $this->assertInstanceOf(Ent\RichBlockList::class, $blocks[14]);
        $this->assertSame('1.', $blocks[14]->getItems()[0]->getLabel());

        // List (task with checkbox)
        $this->assertInstanceOf(Ent\RichBlockList::class, $blocks[15]);
        $this->assertTrue($blocks[15]->getItems()[0]->getHasCheckbox());
        $this->assertNull($blocks[15]->getItems()[0]->getIsChecked());
        $this->assertTrue($blocks[15]->getItems()[1]->getIsChecked());

        // Blockquote with nested blocks
        $this->assertInstanceOf(Ent\RichBlockBlockQuotation::class, $blocks[16]);
        $this->assertCount(3, $blocks[16]->getBlocks());

        // Photo (5 PhotoSize)
        $this->assertInstanceOf(Ent\RichBlockPhoto::class, $blocks[17]);
        $this->assertCount(5, $blocks[17]->getPhoto());

        // Video
        $this->assertInstanceOf(Ent\RichBlockVideo::class, $blocks[18]);
        $this->assertSame(44, $blocks[18]->getVideo()->getDuration());

        // Animation
        $this->assertInstanceOf(Ent\RichBlockAnimation::class, $blocks[21]);

        // Photo with caption
        $this->assertInstanceOf(Ent\RichBlockPhoto::class, $blocks[22]);
        $this->assertNotNull($blocks[22]->getCaption());
        $this->assertSame('Photo caption', $blocks[22]->getCaption()->getText());

        // Animation with caption
        $this->assertInstanceOf(Ent\RichBlockAnimation::class, $blocks[26]);

        // Table (bordered + striped)
        $this->assertInstanceOf(Ent\RichBlockTable::class, $blocks[27]);
        $this->assertTrue($blocks[27]->getIsBordered());

        // Paragraph with mathematical_expression
        $this->assertInstanceOf(Ent\RichBlockMathematicalExpression::class, $blocks[29]);

        // Heading with nested italic
        $this->assertInstanceOf(Ent\RichBlockSectionHeading::class, $blocks[31]);
        $headingText = $blocks[31]->getText();
        $this->assertIsArray($headingText);
        $this->assertInstanceOf(Ent\RichTextItalic::class, $headingText[1]);

        // Deep nested: paragraph → bold → italic → underline
        $nestedParagraph = $blocks[32];
        $this->assertInstanceOf(Ent\RichBlockParagraph::class, $nestedParagraph);
        $bold = $nestedParagraph->getText()[7];
        $this->assertInstanceOf(Ent\RichTextBold::class, $bold);
        $italic = $bold->getText()[1];
        $this->assertInstanceOf(Ent\RichTextItalic::class, $italic);
        $underline = $italic->getText()[1];
        $this->assertInstanceOf(Ent\RichTextUnderline::class, $underline);
        $this->assertSame('underlined italic bold', $underline->getText());

        // Blockquote with bold→strikethrough→spoiler nested
        $this->assertInstanceOf(Ent\RichBlockBlockQuotation::class, $blocks[33]);

        // Details block
        $this->assertInstanceOf(Ent\RichBlockDetails::class, $blocks[38]);
        $this->assertTrue($blocks[38]->getIsOpen());

        // Collage + Slideshow
        $this->assertInstanceOf(Ent\RichBlockCollage::class, $blocks[40]);
        $this->assertInstanceOf(Ent\RichBlockSlideshow::class, $blocks[41]);

        // Footer with footnotes
        $this->assertInstanceOf(Ent\RichBlockFooter::class, $blocks[42]);
    }
}
