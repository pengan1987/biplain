# biplain
Biplain is a fork of [tuplain](https://github.com/seece/tuplain) using Bilibili as its video source.

tuplain is a YouTube doubler script/web page. Since the YouTube is not accessable in mainland China, I make this fork for users who livinng in China and also interest to video dubbing.

## License
This software is licensed under the MIT License, see COPYING for details.

## Usage
Just like tuplain, you can create a URL with Bilibili's video id (BVID), all paramters remained the same to tuplain.

You can try this [Example](https://andyzhk.azurewebsites.net/tuplain.html?audio=BV1YW411e7Rr&video=BV1E4411p7CT&l=120&vs=28&as=3)

# biplain中文说明 （Chinese Introduction）
Biplain是 [tuplain](https://github.com/seece/tuplain) 的一个分支版本，是一个制作重配音（dubbing）视频的网页版小工具。

与使用YouTube作为视频源的tuplain不同，biplain使用中文世界中更流行的bilibili作为视频源。由于在中国内地YouTube访问受限，这个版本希望能够服务于对重配音视频有兴趣的中国用户。

目前暂时没有合适的图形化用户界面，您需要手工编辑URL链接，可用的参数如下：

audio = 提供配音的视频BVID （可缩写为“a”参数）  
video = 提供画面的视频BVID （可缩写为“v”参数）  
audiostart, videostart = 声音和视频轨道的起始时间，以秒为单位 （可缩写为“as”和“vs”参数）  
vrate, arate = 播放速度 可以尝试0.25（1/4慢放）, 0.5（1/2慢放）, 1.0（原速）, 1.5（1.5倍快放） 或 2.0（2倍快放）  
vvol, avol = 视频和音频轨道的音量，可用数值 0-100. （可缩写为 “vv”和“av”参数）  
len = 播放总长度 （可缩写为“l”参数）

您可以尝试这个 [例子](https://andyzhk.azurewebsites.net/tuplain.html?audio=BV1YW411e7Rr&video=BV1E4411p7CT&l=120&vs=28&as=3)