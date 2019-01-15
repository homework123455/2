# final12
* 系統部分畫面

## 會員登入畫面

![Imgur](https://i.imgur.com/unEKRvD.jpg)

## 會員租借畫面

![Imgur](https://i.imgur.com/qvZuvEe.jpg)

## 會員場地畫面

![Imgur](https://i.imgur.com/2vUz5mw.jpg)

## 管理員登入畫面

![Imgur](https://i.imgur.com/klotK11.jpg)
## 管理員管理場地畫面

![Imgur](https://i.imgur.com/VmJEMB7.jpg)
## 管理員管理申請畫面

![Imgur](https://i.imgur.com/7Dhwk7l.jpg)
## 管理員管理公告畫面

![Imgur](https://i.imgur.com/sCZx8FV.jpg)

## 管理員管理會員畫面

![Imgur](https://i.imgur.com/FD91QYz.jpg)

* 系統的作用 

由於學校體育館租借場地採用現場登記，常常到了體育館後才發現場地已經被借走了，而且登記方式仍然採用紙本作業，資料難以保存且不環保，
如果採用網路租借的方式，讓要借場地的人，如教師、學生、校友…等，
可以提前在網路上查詢是否還有空場地，並且可以提前預約，不但節省了許多時間也節省了許多人力；
而學校體育室的管理員們，能因這系統節省流程時間、方便控管，也替地球盡一份環保心力，因此藉由這個課程，模擬此系統。

* 系統的主要功能 (簡要列出每一功能、路由、及負責的同學)

1. 公告:顯示、新增、刪除、修改 ->負責人:[陳資翰](https://github.com/3A532010) [尤盈宜](https://github.com/3A532017) [黃宥領](https://github.com/3A532043)
![Imgur](https://i.imgur.com/btKgzHw.jpg)
2. 場地:顯示、新增、刪除、修改、查詢、租借等功能 ->負責人:[陳資翰](https://github.com/3A532010) [尤盈宜](https://github.com/3A532017) [黃宥領](https://github.com/3A532043)
![Imgur](https://i.imgur.com/QktoGC3.jpg)
3. 會員:顯示、新增、刪除、修改 ->負責人:[陳資翰](https://github.com/3A532010) [尤盈宜](https://github.com/3A532017) [黃宥領](https://github.com/3A532043)
![Imgur](https://i.imgur.com/K2tHM8a.jpg)
4. 違規:新增、刪除、修改 ->負責人:[陳資翰](https://github.com/3A532010) [尤盈宜](https://github.com/3A532017) [黃宥領](https://github.com/3A532043)
![Imgur](https://i.imgur.com/XKYKzCZ.jpg)


* 初始專案與DB負責的同學 (若負責的同學超過一位，列出每一位同學負責的部分)

1. 初始專案負責人:[陳資翰](https://github.com/3A532016)
2. DB建置負責人:[陳資翰](https://github.com/3A532010) [尤盈宜](https://github.com/3A532017) [黃宥領](https://github.com/3A532043)

* 額外使用的套件或樣板 (簡要說明用途)

1. "recca0120/laravel-tracy": "^1.7" :快速檢測並糾正錯誤
記錄錯誤
轉儲變量
測量腳本/查詢的執行時間
看內存消耗



* 系統復原步驟 (包括測試資料)

從github上clone回來
```
git clone https://github.com/WISD-2018/final12
```
切換到專案目錄
```
cd final12
```
還原composer 套件
```
composer install
```

複製.env.example生成.env
```
cp .env.example .env

```
產生金鑰
```
artisan key:generate
```

其他環境設置問題以及MySQL資料庫，請參考 **測試用環境檔**

能成功看到主頁代表成功

* 系統使用帳號

展示用帳號(如有需要可以自行註冊)
* 管理者
> 帳號:admin123@gmail.com 密碼:admin123
* 使用者
> 帳號:user123@gmail.com 密碼:user123
* 系統開發人員
1. [陳資翰](https://github.com/3A532010)

2. [尤盈宜](https://github.com/3A532017)

3. [黃宥領](https://github.com/3A532043)
