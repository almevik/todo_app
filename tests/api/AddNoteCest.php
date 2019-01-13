<?php

class AddNoteCest
{
    public function _before(ApiTester $I)
    {
    }

    public function testList(ApiTester $I)
    {
        $I->amBearerAuthenticated('1111111111111');
        $I->haveHttpHeader('Content-Type', 'application/json; charset=UTF-8');
        $I->sendGET('http://basic/api/notes');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
    }

    public function testView(ApiTester $I)
    {
        $I->amBearerAuthenticated('1111111111111');
        $I->haveHttpHeader('Content-Type', 'application/json; charset=UTF-8');
        $I->sendGET('http://basic/api/notes/1');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'title' => 'test22',
            'id' => '1',
            'date'  => '2019-10-10',
            'text'  => 'Заметка 1'
        ]);
    }

    public function testEditSave(ApiTester $I)
    {
        $I->amBearerAuthenticated('1111111111111');
        $I->haveHttpHeader('Content-Type', 'application/json; charset=UTF-8');
        $I->sendPATCH('http://basic/api/notes/1', json_encode(['title' => 'test22', 'date' => '2019-10-10', 'text' => 'Заметка 1']));
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'title' => 'test22',
            'id' => '1',
            'date'  => '2019-10-10',
            'text'  => 'Заметка 1'
        ]);
    }

    public function testDelete(ApiTester $I)
    {
        $I->amBearerAuthenticated('1111111111111');
        $I->haveHttpHeader('Content-Type', 'application/json; charset=UTF-8');
        $I->sendDELETE('http://basic/api/notes/1');
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::NO_CONTENT); // 200
    }

    public function tryAdd(ApiTester $I)
    {
        $I->amBearerAuthenticated('1111111111111');
        $I->haveHttpHeader('Content-Type', 'application/json; charset=UTF-8');
        $I->sendPOST('http://basic/api/notes', json_encode(['title' => 'Заметка тестовая', 'date' => '2019-01-10', 'text' => 'Текст заметки']));
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'title' => 'Заметка тестовая',
            'date'  => '2019-01-10',
            'text'  => 'Текст заметки'
        ]);
    }
}
