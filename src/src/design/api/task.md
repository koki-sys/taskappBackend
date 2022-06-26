# 概要

タスク関連の API に関するものです。

## アクセストークン

## ステータスコード

下記のコードを返却します。

| ステータスコード | 説明                                             |
| ---------------- | ------------------------------------------------ |
| 200              | リクエスト成功                                   |
| 201              | 登録成功                                         |
| 204              | リクエストに成功したが返却する body が存在しない |
| 400              | 不正なリクエストパラメータを指定している         |
| 401              | API アクセストークンが不正、または権限不正       |
| 404              | 存在しない URL にアクセス                        |
| 429              | リクエスト制限を超えている                       |
| 500              | 不明なエラー                                     |

## 利用制限

# タスク機能

## タスク追加

```
POST /api/task/add HTTP/1.1
```

### Request

| パラメータ | 型       | 内容                 | 必須 | デフォルト値 | 最大値 |
| ---------- | -------- | -------------------- | ---- | ------------ | ------ |
| name       | string   | タスクの名前         | 〇   |              |        |
| deadline   | datetime | タスクの締め切り日付 |      |              |        |
| staff      | datetime | タスクの担当者       |      |              |        |

```json
{
    "name": "ログイン・ログアウト機能を作成",
    "deadline": "2022/02/10",
    "staff": ["testB", "testC"]
}
```

### Response

```
HTTP/1.1 200 OK
```

## タスク完了

```
POST /api/task/check HTTP/1.1
```

### Request

| パラメータ | 型      | 内容        | 必須 | デフォルト値 | 最大値 |
| ---------- | ------- | ----------- | ---- | ------------ | ------ |
| task_id    | integer | タスク ID   | 〇   |              |        |
| team_id    | integer | チームの ID | 〇   |              |        |

```json
{
    "task_id": 1,
    "team_id": 2
}
```

### Response

```
HTTP/1.1 200 OK
```

## 完了タスク表示

```
GET /api/task/done HTTP/1.1
```

### Request

| パラメータ | 型      | 内容        | 必須 | デフォルト値 | 最大値 |
| ---------- | ------- | ----------- | ---- | ------------ | ------ |
| team_id    | integer | チームの ID |      |              |        |

```json
{
    "team_id": 1
}
```

### Response

```json
{
    {
        "id": 1,
        "user_id": 2,
        "user_name": "testB",
        "task_id": 1,
        "task_name": "画面設計書の設計",
        "task_flg": 1
    },
    {
        "id": 2,
        "user_id": 3,
        "user_name": "testC",
        "task_id": 2,
        "task_name": "トップページの作成",
        "task_flg": 1
    }
}
```

## 実行タスク表示

```
GET /api/task/doing HTTP/1.1
```

### Request

| パラメータ | 型      | 内容        | 必須 | デフォルト値 | 最大値 |
| ---------- | ------- | ----------- | ---- | ------------ | ------ |
| team_id    | integer | チームの ID |      |              |        |

```json
{
    "team_id": 1
}
```

### Response

```json
{
    {
        "id": 3,
        "user_id": 2,
        "user_name": "testB",
        "task_id": 3,
        "task_name": "データベースの設定",
        "task_flg": 0
    },
    {
        "id": 4,
        "user_id": 3,
        "user_name": "testC",
        "task_id": 4,
        "task_name": "E-R図",
        "task_flg": 0
    }
}
```

## タスク削除

```
DELETE /api/task/delete HTTP/1.1
```

### Request

| パラメータ | 型      | 内容 | 必須 | デフォルト値 | 最大値 |
| ---------- | ------- | ---- | ---- | ------------ | ------ |
| id         | integer | ID   | 〇   |              |        |

```json
{
    "id": 1
}
```

### Response

```
HTTP/1.1 200 OK
```
