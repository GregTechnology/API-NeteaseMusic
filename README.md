# API NeteaseMusic
基于 [Meting](https://github.com/metowolf/Meting) 修改的网易云音乐API

Demo: `GET https://api.littlehands.site/NeteaseMusic/`

[GitHub 地址](https://github.com/moeshin/API-NeteaseMusic) | [GitHub 下载](https://codeload.github.com/moeshin/API-NeteaseMusic/zip/master)

<!--more-->

## 参数说明
参数|说明
-|-
type|指定请求类型
id|类型对应的ID

type|说明
-|-
list|歌单
song|歌曲
lyric|歌词

## 返回说明
list|类型|说明
-|-|-
id|int|歌曲id
name|string|歌曲名
artist|array|歌手
pic|string|封面地址

song|类型|说明
-|-|-
url|string|歌曲地址
size|int|歌曲大小
br|int|比特率

lyric|类型|说明
-|-|-
lyric|string|原歌词
tlyric|string|翻译歌词

**!!切勿使用本API下载版权保护音乐!!**
