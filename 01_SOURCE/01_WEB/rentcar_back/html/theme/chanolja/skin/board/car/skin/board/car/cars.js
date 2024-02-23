var cars = new Array();

cars['제조사'] = 'BMW,닛산,닷지,도요타,람보르기니,랜드로버,렉서스,로터스,롤스로이스,링컨,마세라티,마쯔다,머큐리,미쓰비시,벤츠,벤틀리,볼보,부가티,뷰익,사브,사이언,새턴,스바루,스즈키,시보레,시트로엥,아우디,아큐라,알파로메오,애스톤마틴,이스즈,인피니티,재규어,지엠씨,지프,캐딜락,코니세그,크라이슬러,파가니,페라리,포드,포르쉐,폭스바겐,폰티악,푸조,피아트,허머,혼다,홀덴';

cars['BMW'] = '3시리즈,5시리즈,6시리즈,7시리즈,8시리즈,M3,M5,M6,X3,X5,Z3,Z4,Z8,Z99,미니,알피나';
cars['BMW->3시리즈'] = '318I,318IA,320I,320I CP,320IA,323CI,323I,323IA,325CI,325I,325XI,328CI,328I,330CI,330I,335I';
cars['BMW->5시리즈'] = '520I,520IA,523I,525I,525IA,528I,528IA,528IM,530DA,530I,530IE,535I,540I,545I,550I';
cars['BMW->6시리즈'] = '645CI,650CI,650I';
cars['BMW->7시리즈'] = '728I,728IAL,728IL,730I,730IA,730IAL,730LI,735I,735IAL,735IL,735LI,740I,740IAL,740IL,740LI,745I,745LI,750I,750IAL,750IL,750LI,760LI,L7';
cars['BMW->8시리즈'] = '840CI 4.0,840I 4.4,850CI 5.0,850CI 5.4,850I 5.0';
cars['BMW->M3'] = '쿠페';    
cars['BMW->M5'] = '세단';
cars['BMW->M6'] = '컨버터블 5.0,쿠페 5.0';
cars['BMW->X3'] = '2.5I,3.0D,3.0I';
cars['BMW->X5'] = '3.0D,3.0I,4.4,4.4I';
cars['BMW->Z3'] = '로드스터 1.9I,로드스터 2.0I,로드스터 2.2I,로드스터 2.8,로드스터 3.0I,해치백 3.0I';
cars['BMW->Z4'] = '2.5I,3.0I,3.0SI 로드스터,3.0SI 쿠페,M 로드스터,M 쿠페';
cars['BMW->Z8'] = '로드스터';
cars['BMW->Z99'] = '디젤,터보';
cars['BMW->미니'] = '1.6,쿠퍼,쿠퍼 S';
cars['BMW->알피나'] = 'B3 BI-TURBO,B5,B6,B7,B8,D3';


cars['닛산'] = '350Z,BUTO,스카이라인,알티마,큐브,패스파인더,페어레이디 Z,프리메라,피가로';
cars['닛산->350Z'] = '3.5,35주년 기념판 3.5,GT4 3.5,로드스터 3.5';
cars['닛산->BUTO'] = '1.0';
cars['닛산->스카이라인'] = '2.0 GTS,2.0 GTS-T 쿠페,2.5 GTS-T,2.6 GT-R 터보 R34,2.8 GT-R 트윈-터보 R34 니스모 Z-튜닝,250 GT,250 GT FOUR,250 GTS,300 GT,350 GT 타입 P,350 GT 타입 SP,350 GT-8,R33 GT-R,R33 GT-R 스펙 V';
cars['닛산->알티마'] = '2.4,2.5,3.5,S 2.5,SE 3.5,SE-R 3.5';
cars['닛산->큐브'] = '1.3,1.4,1.5';
cars['닛산->패스파인더'] = '2.5 DCI,3.0,3.3,3.5,4.0';
cars['닛산->페어레이디 Z'] = '2_2 스포츠 2.0,3.0,3.5,스포츠 2.0';
cars['닛산->프리메라'] = '1.6,1.8,2.0,2.0 D,2.0 GT,2.0 TD,2.0 ZX,2.2 DCI';
cars['닛산->피가로'] = '1.0 16V 터보';


cars['닷지'] = 'RAM 1500,RAM 2500,다코타,바이퍼,스타크래프트,캐러밴,캘리버';
cars['닷지->RAM 1500'] = 'SLT 롱 베드 2WD,SLT 롱 베드 4WD,SLT 숏 베드 2WD,SLT 숏 베드 4WD,SLT 쿼드 캡 롱 베드 2WD,SLT 쿼드 캡 롱 베드 4WD,SLT 쿼드 캡 숏 베드 2WD,SLT 쿼드 캡 숏 베드 4WD,SLT 플러스 롱 베드 2WD,SLT 플러스 롱 베드 4WD,SLT 플러스 숏 베드 2WD,SLT 플러스 숏 베드 4WD,SLT 플러스 쿼드 캡 롱 베드 2WD,SLT 플러스 쿼드 캡 롱 베드 4WD,SLT 플러스 쿼드 캡 숏 베드 2WD,SLT 플러스 쿼드 캡 숏 베드 4WD,ST 롱 베드 2WD,ST 롱 베드 4WD,ST 숏 베드 2WD,ST 숏 베드 4WD,ST 쿼드 캡 롱 베드 2WD,ST 쿼드 캡 롱 베드 4WD,ST 쿼드 캡 숏 베드 2WD,ST 쿼드 캡 숏 베드 4WD';
cars['닷지->RAM 2500'] = 'SLT 4X4,SLT 메가 캡 4X4,SLT 쿼드 캡 4X4,SLT 쿼드 캡 LWB 4X4,SPORT 4X4,ST 4X4,ST 쿼드 캡 4X4,ST 쿼드 캡 LWB 4X4,TRX4 오프로드,TRX4 오프로드 쿼드 캡,래러미 메가 캡 4X4,래러미 쿼드 캡 4X4,래러미 쿼드 캡 LWB 4X4,스포츠 쿼드 캡 4X4,스포츠 쿼드 캡 LWB 4X4,파워 왜건,파워 왜건 쿼드 캡';
cars['닷지->다코타'] = '2WD,4WD,R/T 2WD,R/T 클럽 캡 2WD,SLT 2WD,SLT 4WD,SLT 쿼드 캡 2WD,SLT 쿼드 캡 4WD,SLT 클럽 캡 2WD,SLT 클럽 캡 4WD,SLT 플러스 2WD,SLT 플러스 쿼드 캡 2WD,SLT 플러스 쿼드 캡 4WD,SLT 플러스 클럽 캡 2WD,SLT 플러스 클럽 캡 4WD,SXT 2WD,SXT 4WD,SXT 쿼드 캡 2WD,SXT 쿼드 캡 4WD,SXT 클럽 캡 2WD,SXT 클럽 캡 4WD,스포츠 2WD,스포츠 4WD,스포츠 쿼드 캡 2WD,스포츠 쿼드 캡 4WD,스포츠 클럽 캡 2WD,스포츠 클럽 캡 4WD,스포츠 플러스 2WD,스포츠 플러스 4WD,스포츠 플러스 쿼드 캡 2WD,스포츠 플러스 쿼드 캡 4WD,스포츠 플러스 클럽 캡 2WD,스포츠 플러스 클럽 캡 4WD,클럽 캡 2WD,클럽 캡 4WD';
cars['닷지->바이퍼'] = 'GTS,RT 10,SRT10 컨버터블,SRT10 쿠페';
cars['닷지->스타크래프트'] = '컨버전 밴';
cars['닷지->캐러밴'] = 'GRAND SE,SE,그랜드 EL,그랜드 ES,그랜드 ES AWD,그랜드 EX,그랜드 스포츠,그랜드 스포츠 AWD,스포츠';
cars['닷지->캘리버'] = '1.8 SE,1.8 STX SPORT,2.0 SXT,2.4 R/T AWD,2.4 R/T FWD,SRT4 FWD';


cars['도요타'] = 'FJ 크루저,MR-S,MR2,랜드 크루져,비비,셀리카,소아라,수프라,스테이션,아발론,야리스,윌,카롤라,카세르타,캠리,캠리 솔라라,크라운,팟소,프리우스,하이에이스';
cars['도요타->FJ 크루저'] = '4X2 AT V6,4X4 AT V6,4X4 MT V6,BAJA 1000';
cars['도요타->MR-S'] = 'U-EDIT';
cars['도요타->MR2'] = 'GT';
cars['도요타->랜드 크루져'] = 'PRADO';
cars['도요타->비비'] = 'I4 1.5';
cars['도요타->셀리카'] = 'GT';
cars['도요타->소아라'] = '2.5,3.0,4.0,GT,GT-LTD,GT-T,SCV';
cars['도요타->수프라'] = 'STD HATCHBACK';
cars['도요타->스테이션'] = '2.0';
cars['도요타->아발론'] = 'XL,XLS';
cars['도요타->야리스'] = 'S 세단 1.5,리프트백 1.5,세단 1.5';
cars['도요타->윌'] = 'VS';
cars['도요타->카롤라'] = 'CE';
cars['도요타->카세르타'] = 'LIMITED';
cars['도요타->캠리'] = 'CE,LE,LE V6,XLE';
cars['도요타->캠리 솔라라'] = 'SLE V6';
cars['도요타->크라운'] = 'ESTATE,ROYAL SALON';
cars['도요타->팟소'] = '1.3';
cars['도요타->프리우스'] = 'HYBRID 1.5 VVT-I,TOURING HYBRID 1.5 VVT-I';
cars['도요타->하이에이스'] = '2.7L VVT-I,3.0L,LPG';


cars['람보르기니'] = 'LM002,가야르도,디아블로,무르시엘라고';
cars['람보르기니->LM002'] = 'V12 5.2';
cars['람보르기니->가야르도'] = 'SE V10 5.0,SPYDER V10 5.0,V10 5.0';
cars['람보르기니->디아블로'] = 'V12 5.8,V12 6.0';
cars['람보르기니->무르시엘라고'] = 'LP640 ROADSTER V12 6.5,LP640 V12 6.5,R-GT V12 6.0,ROADSTER V12 6.2,V12 6.2';


cars['랜드로버'] = '디스커버리,디스커버리Ⅲ,디스커버리Ⅱ,레인지로버,레인지로버 스포츠,프리랜더,프리랜더2';
cars['랜드로버->디스커버리'] = '4.0,TD5 ES,TD5 XS,V6 PETROL,V8 ES,V8 XS';
cars['랜드로버->디스커버리Ⅲ'] = '2.7 TDV6 HSE,4.0,V6 HSE';
cars['랜드로버->디스커버리Ⅱ'] = 'ES V8I,TD5 2.5,V8 4.0,XS V8I';
cars['랜드로버->레인지로버'] = '4.0 SE,4.4 HSE,4.4DT,4.6 HSE,V8 4.2 SUPERCHARGED';
cars['랜드로버->레인지로버 스포츠'] = '2.7 TDV6 HSE,V8 4.4 HSE';
cars['랜드로버->프리랜더'] = '2.0 TD4 DIESEL,2.5 V6 PETROL,3-DOOR,5-DOOR,V6 3DR SE,V6 5DR HSE';
cars['랜드로버->프리랜더2'] = 'I6 HSE,TD4 HSE';


cars['렉서스'] = 'ES,GS,GX,IS,LS,LX,RX,SC';
cars['렉서스->ES'] = '300 L GRADE,300 P GRADE,300 STANDARD,330 L GRADE,330 P GRADE,350 P GRADE,350S GRADE';
cars['렉서스->GS'] = '300 L GRADE,300 P GRADE,300 STANDARD,350,430,450H';
cars['렉서스->GX'] = '470';
cars['렉서스->IS'] = '200 I GRADE,200 L GRADE,200 S GRADE,200 STANDARD,250,300,300 SPORTCROSS,350';
cars['렉서스->LS'] = '400,430 L GRADE,430 P GRADE,430 STANDARD,460,460L,600HL';
cars['렉서스->LX'] = '470';
cars['렉서스->RX'] = '300 L GRADE,300 P GRADE,300 STANDARD,330 L GRADE,330 P GRADE,350 P GRADE,400H 2WD,400H 4WD';
cars['렉서스->SC'] = '300,430';


cars['로터스'] = '엘리제';
cars['로터스->엘리제'] = '1.8';


cars['롤스로이스'] = '실버 세라프,실버 스퍼,팬텀';
cars['롤스로이스->실버 세라프'] = 'V12 5.4';
cars['롤스로이스->실버 스퍼'] = 'V8 6.7';
cars['롤스로이스->팬텀'] = 'V12 6.75';


cars['링컨'] = 'LS,MKX,MKZ,네비게이터,에이비에이터,컨티넨탈,타운카';
cars['링컨->LS'] = '3.0,3.9';
cars['링컨->MKX'] = '3.5';
cars['링컨->MKZ'] = '3.5';
cars['링컨->네비게이터'] = '4X2 5.4L 3V SOHC V8,4X4 5.4L 3V SOHC V8,L 4X2 5.4L 3V SOHC V8,L 4X4 5.4L 3V SOHC V8,ULTIMATE 4X2 5.4L 3V SOHC V8,ULTIMATE 4X4 5.4L 3V SOHC V8';
cars['링컨->에이비에이터'] = '3.0,4.6';
cars['링컨->컨티넨탈'] = '3.8,4.6';
cars['링컨->타운카'] = 'LWB,SWB,리무진';


cars['마세라티'] = '222,228,3200GT,4200GT,MC12,기블리,샤멀,스파이더,카리프,콰트로포르테,쿠페';
cars['마세라티->222'] = '2.8 트윈 터보';
cars['마세라티->228'] = '2.8 트윈 터보';
cars['마세라티->3200GT'] = '3.2';
cars['마세라티->4200GT'] = '4.2';
cars['마세라티->MC12'] = '6.0';
cars['마세라티->기블리'] = '2.0 트윈 터보,GT 2.8 트윈 터보';
cars['마세라티->샤멀'] = '3.2 트윈 터보';
cars['마세라티->스파이더'] = '4.2,캄비오코르사 4.2 V8';
cars['마세라티->카리프'] = '2.8 트윈 터보';
cars['마세라티->콰트로포르테'] = '2.8 트윈 터보,3.2 트윈 터보,4.2,4.2 EXECUTIVE GT,4.2 SPORT GT';
cars['마세라티->쿠페'] = '4.2,캄비오코르사 4.2 V8';


cars['마쯔다'] = 'CX-7,CX-9,MX-5,RX-7,RX-8,마쯔다스피드,미아타,밀레니아,유노스 로드스터';
cars['마쯔다->CX-7'] = '2.3 터보';
cars['마쯔다->CX-9'] = '3.5';
cars['마쯔다->MX-5'] = '1.6,1.8,2.0';
cars['마쯔다->RX-7'] = '1.3 RC-2 트윈 로터,1.3 RC-2 트윈 로터 터보';
cars['마쯔다->RX-8'] = '1.3 르네시스 트윈 로터';
cars['마쯔다->마쯔다스피드'] = 'MX-5 1.8 터보,미아타 1.8 터보';
cars['마쯔다->미아타'] = '1.6,1.8';
cars['마쯔다->밀레니아'] = '2.3 슈퍼챠져,2.5';
cars['마쯔다->유노스 로드스터'] = '1.6,1.8,1.8 RS,2.0';


cars['머큐리'] = '미스틱,빌리저,세이블,쿠거';
cars['머큐리->미스틱'] = '2.0';
cars['머큐리->빌리저'] = '3.0 VAN';
cars['머큐리->세이블'] = 'GS,LS,LTS';
cars['머큐리->쿠거'] = '2.5';


cars['미쓰비시'] = '3000GT,FTO,랜서,이클립스';
cars['미쓰비시->3000GT'] = '3.0,SL,VR4 3.0 트윈 터보';
cars['미쓰비시->FTO'] = '1.8 GS,2.0 GP,2.0 GPX,2.0 GPX 한정판,2.0 GS';
cars['미쓰비시->랜서'] = '1.6,2.0,2.4,에볼루션 I 2.0,에볼루션 II 2.0,에볼루션 III 2.0,에볼루션 IX 260 2.0 터보,에볼루션 IX MR FQ-300 2.0 터보,에볼루션 IX MR FQ-320 2.0 터보,에볼루션 IX MR FQ-340 2.0 터보,에볼루션 V GSR 2.0,에볼루션 VI GSR 토미 마키 2.0 터보,에볼루션 VI RS 2.0 터보,에볼루션 VII GSR 2.0 터보,에볼루션 VII GTA 2.0 터보,에볼루션 VII RS 2.0 터보,에볼루션 VIII 260 2.0 터보,에볼루션 VIII MR FQ-300 2.0 터보,에볼루션 VIII MR FQ-320 2.0 터보,에볼루션 VIII MR FQ-340 2.0 터보,에볼루션 VIII MR FQ-400 2.0 터보';
cars['미쓰비시->이클립스'] = '1.8,1.8 GS,1.8 RS,2.0,2.0 GS,2.0 GS 터보,2.0 GS 터보 스파이더,2.0 GST 터보,2.0 GSX I4,2.0 GSX 터보,2.0 GT,2.0 RS,2.0 터보,2.4,2.4 GS 스파이더,2.4 GSX 터보,2.4 RS,2.4 RS I4,2.7 GS,3.0 GT,3.0 GT SPYDER,3.0 GT 프리미엄,3.0 GTS,3.8 GT';


cars['벤츠'] = '300,400,560,A-클래스,B-클래스,C-클래스,CL-클래스,CLK-클래스,CLS-클래스,E-클래스,G-클래스,GL-클래스,M-클래스,R-클래스,S-클래스,SEL,SL-클래스,SLK-클래스,SPRINTER,V-클래스,마이바흐,스마트';
cars['벤츠->300'] = '3.0';
cars['벤츠->400'] = '400SEL';
cars['벤츠->560'] = 'SEL';
cars['벤츠->A-클래스'] = 'A140,A160,A190';
cars['벤츠->B-클래스'] = 'B200';
cars['벤츠->C-클래스'] = '200ML,C180,C180K,C200,C200K,C200K 스포츠 쿠페,C220,C230,C240,C280,C32 AMG,C320,C36 AMG';
cars['벤츠->CL-클래스'] = 'CL500,CL55 AMG,CL550,CL600,CL65 AMG';
cars['벤츠->CLK-클래스'] = 'CLK200,CLK230 쿠페,CLK230K 카브리올레,CLK240 카브리올레,CLK240 쿠페,CLK320 카브리올레,CLK320 쿠페,CLK350,CLK430 카브리올레,CLK430 쿠페,CLK500,CLK500 카브리올레,CLK500 쿠페,CLK55 AMG,CLK63 AMG';
cars['벤츠->CLS-클래스'] = 'CLS350,CLS500,CLS55 AMG,CLS550,CLS63 AMG';
cars['벤츠->E-클래스'] = 'E200,E200K,E220,E230,E240,E240 아방가르드,E260,E280,E320,E320 아방가르드,E350,E350 매틱,E400,E420,E430,E500,E55 AMG,E63 AMG';
cars['벤츠->G-클래스'] = 'G-WAGEN,G320,G500,G55 AMG';
cars['벤츠->GL-클래스'] = 'GL 320 CDI 4MATIC,GL 420 CDI 4MATIC,GL 450 4MATIC,GL 500 4MATIC';
cars['벤츠->M-클래스'] = 'ML270 CDI,ML280 CDI,ML320,ML350,ML350 4매틱,ML400 CDI,ML430,ML500,ML55 AMG';
cars['벤츠->R-클래스'] = 'R350';
cars['벤츠->S-클래스'] = '280 SEL,300 SD,300 SEL,450 SEL,500 SEL,560 SEL,S280,S320 LWB 세단,S320 SWB 세단,S350,S350L,S420,S420L,S430,S430L,S500,S500L,S500L 4매틱,S55 AMG,S550,S550 4매틱,S550 AMG,S550L,S550L 4MATIC AMG,S600,S600L,S63 AMG';
cars['벤츠->SEL'] = '280,300,560';
cars['벤츠->SL-클래스'] = 'SL280,SL300,SL320,SL350,SL500,SL55 AMG,SL600,SL65 AMG';
cars['벤츠->SLK-클래스'] = 'SLK200K,SLK200ML,SLK230,SLK230K,SLK280,SLK32 AMG,SLK320,SLK350,SLK55 AMG';
cars['벤츠->SPRINTER'] = '220';
cars['벤츠->V-클래스'] = 'V220 CDI,V230,비아노 3.2';
cars['벤츠->마이바흐'] = '57,57S,62';
cars['벤츠->스마트'] = '로드스터,스마트';


cars['벤틀리'] = '아르나지,아주어,콘티넨탈';
cars['벤틀리->아르나지'] = 'R 6.7,RL 6.7,T 6.7';
cars['벤틀리->아주어'] = '컨버터블';
cars['벤틀리->콘티넨탈'] = 'GT,GTC,플라잉스퍼';


cars['볼보'] = '740,850,940,960,C30,C70,S40,S60,S70,S80,S90,V40,V50,V70,XC70,XC90';
cars['볼보->740'] = 'GL';
cars['볼보->850'] = 'GLE,GLT,터보';
cars['볼보->940'] = 'GL,GLE,이스테이트,터보';
cars['볼보->960'] = '2.5L,3.0,로얄 DLX,익스큐티브';
cars['볼보->C30'] = '2.4I';
cars['볼보->C70'] = 'CONVERTIBLE,T5,쿠페';
cars['볼보->S40'] = '2.4I,T5';
cars['볼보->S60'] = '2.0T,2.4D,2.4I,2.4T,2.5T,AWD,D,D5,R,T5';
cars['볼보->S70'] = 'GLT,SE';
cars['볼보->S80'] = '2.0T,2.4,2.4D,2.5T,2.9,3.2,D5,EXE,T5,T6,V8 AWD';
cars['볼보->S90'] = '3.0';
cars['볼보->V40'] = 'T4,T5';
cars['볼보->V50'] = '2.4I';
cars['볼보->V70'] = '2.4,2.5T,R';
cars['볼보->XC70'] = '2.5T AWD,CROSS COUNTRY 2.5T AWD,D5 AWD';
cars['볼보->XC90'] = '2.5T AWD,3.2 AWD,D5 AWD,T6 AWD,V8 AWD';


cars['부가티'] = 'EB,베이론';
cars['부가티->EB'] = '110';
cars['부가티->베이론'] = '16.4';


cars['뷰익'] = '라크로스,랑데뷰,레이니어,루체륜,르세이버,리베라,테라자,파크 에비뉴';
cars['뷰익->라크로스'] = 'CX,CXL,CXS';
cars['뷰익->랑데뷰'] = 'CX 2WD,CX 4WD,CXL 2WD,CXL 4WD';
cars['뷰익->레이니어'] = 'CXL 2WD,CXL 4WD';
cars['뷰익->루체륜'] = 'CX,CXL V6,CXL V8,CXS';
cars['뷰익->르세이버'] = 'V6';
cars['뷰익->리베라'] = '3.8 SE';
cars['뷰익->테라자'] = 'CX 2WD,CX 4WD,CXL 2WD,CXL 4WD';
cars['뷰익->파크 에비뉴'] = 'V6 3.8L';


cars['사브'] = '9-3,9-5,900,9000';
cars['사브->9-3'] = '5DR SE,AERO,ARC,CONVERTIBLE,LINEAR 2.0 LPT,SE CONVERTIBLE';
cars['사브->9-5'] = 'AERO SEDAN,LINEAR 2.0 LPT';
cars['사브->900'] = 'S,S TURBO,SE';
cars['사브->9000'] = 'CD 2.0,CDE 2.0,CDE TURBO,CSE';


cars['사이언'] = 'tC,xA,xB';
cars['사이언->tC'] = 'tC';
cars['사이언->xA'] = 'xA';
cars['사이언->xB'] = 'xB';


cars['새턴'] = 'ION,Sky,VUE,Realy';
cars['새턴->ION'] = '2 세단,2 쿠페,3 세단,3 쿠페,Red Line';
cars['새턴->Sky'] = '컨버터블';
cars['새턴->VUE'] = '4 CYL,V6 2WD,V6 4WD,하이브리드';
cars['새턴->Realy'] = '1.0,2.0,3.0';


cars['스바루'] = 'Impreza,Legacy,Outback,Outback Sport,B9 Tribeca,Forester,Baja';
cars['스바루->Impreza'] = 'Impreza 2.5 I 세단,Impreza 2.5 I 웨건,Impreza Limited 세단,Impreza Limited 웨건,Impreza WRX STi,Impreza WRX TR,Impreza WRX,Impreza WRX 웨건';
cars['스바루->Legacy'] = 'Legacy 2.5 GT Limited,Legacy 2.5 GT Limited 웨건,Legacy 2.5 GT spec.B,Legacy 2.5 i,Legacy 2.5 i Limited,Legacy 2.5 i Limited 웨건,Legacy 2.5 i 웨건';
cars['스바루->Outback'] = 'Outback 2.5 i,Outback 2.5 i Limited,Outback 2.5 i Limited 웨건,Outback 2.5 XT,Outback 2.5 XT Limited,Outback 3.0 R,Outback 3.0 R L.L. Bean Edition,Outback 3.0 R L.L. Bean Edition 웨건,Outback 3.0 R VDC Limited';
cars['스바루->Outback Sport'] = 'Outback Sport 기본형';
cars['스바루->B9 Tribeca'] = 'B9 Tribeca 5인승,B9 Tribeca 5인승,B9 Tribeca 7인승,B9 Tribeca 7인승 Limited';
cars['스바루->Forester'] = 'Forester 2.5 X,Forester 2.5 X L.L. Bean Edition,Forester 2.5 XT Limited';
cars['스바루->Baja'] = 'Baja Sport,Baja Turbo';


cars['스즈키'] = 'Forenza,Reno,Aerio,Aerio SX,Verona,Grand Vitara,XL-7';
cars['스즈키->Forenza'] = 'Premium 세단,Premium 웨건,세단,웨건';
cars['스즈키->Reno'] = 'Convenience,Premium,헤치백';
cars['스즈키->Aerio'] = '2WD,4WD,Premium 2WD,Premium 4WD';
cars['스즈키->Aerio SX'] = 'SX 2WD,SX 4WD,Premium 2WD,SX Premium 4WD';
cars['스즈키->Verona'] = 'Luxury,기본형';
cars['스즈키->Grand Vitara'] = 'Vitara 2WD(A/T),2WD(M/T),4WD(A/T),4WD(M/T),Luxury 2WD,Luxury 4WD,Premium 2WD(A/T),Premium 2WD(M/T),Premium 4WD(A/T),Premium 4WD(M/T),Xsport 2WD,Xsport 4WD';
cars['스즈키->XL-7'] = '2WD,4WD,Premium 2WD,Premium 4WD';


cars['시보레'] = '말리부,말리부 MAXX,몬테카를로,서버밴 1500,서버밴 2500,쉐비밴,스타라인 밴,스타크래프트 밴,아발란치,아베오,아스트로,에퀴녹스,익스프레스,익스플로러 밴,임팔라,코발트,콜벳,타호,트레일블레이저,트레일블레이저 EXT';
cars['시보레->말리부'] = 'LS,LT w/0LT,LT w/1LT,LT w/2LT,LTZ,SS';
cars['시보레->말리부 MAXX'] = 'LT,LTZ,SS';
cars['시보레->몬테카를로'] = 'LS,LT 3.5,LT 3.9,LTZ,SS';
cars['시보레->서버밴 1500'] = 'LS 2WD,LS 2WD w/1WT,LS 4WD,LS 4WD w/1WT,LT 2WD,LT 4WD,LTZ,Z71 2WD,Z71 4WD';
cars['시보레->서버밴 2500'] = 'LS 2WD,LS 4WD,LT 2WD,LT 4WD';
cars['시보레->쉐비밴'] = '쉐비밴';
cars['시보레->스타라인 밴'] = '스타라인 밴';
cars['시보레->스타크래프트 밴'] = '스타크래프트 밴';
cars['시보레->아발란치'] = '아발란치';
cars['시보레->아베오'] = 'LS,LS 헤치백,LT,LT 헤치백,Special Value,Special Value 헤치백';
cars['시보레->아스트로'] = '아스트로';
cars['시보레->에퀴녹스'] = 'LS 2WD,LS 4WD,LT 2WD,LT 4WD';
cars['시보레->익스프레스'] = '익스프레스';
cars['시보레->익스플로러 밴'] = '익스플로러 밴';
cars['시보레->임팔라'] = 'LS,LT 3.5,LT 3.9,LTZ,SS';
cars['시보레->코발트'] = 'LS 세단,LS 쿠페,LT 세단,LT 쿠페,LTZ,SS Supercharged,SS 세단,SS 쿠페';
cars['시보레->콜벳'] = 'Z06,컨버터블,쿠페';
cars['시보레->타호'] = 'LS 2WD,LS 2WD w/1WT,LS 4WD,LS 4WD w/1WT,LT 2WD,LT 4WD,Z71 2WD,Z71 4WD';
cars['시보레->트레일블레이저'] = 'LS 2WD,LS 4WD,LT 2WD,LT 4WD';
cars['시보레->트레일블레이저 EXT'] = 'LS 2WD,LS 4WD,LT 2WD,LT 4WD';


cars['시트로엥'] = 'C5,잔티아';
cars['시트로엥->C5'] = '1.8I 16V,2.0I 16V,3.0I V6,HDI 110 FAP,HDI 138,HDI 138 FAP,HDI 173 FAP';
cars['시트로엥->잔티아'] = 'ESTATE';


cars['아우디'] = '100,80,A3,A4,A6,A8,Q7,RS4,RS6,S3,S4,S6,S8,TT,올로드 콰트로';
cars['아우디->100'] = 'E 2.0,E 2.3,E 2.3 콰트로,E 2.6,E 2.8,E 2.8 콰트로';
cars['아우디->80'] = '1.6 CL,1.6 D,1.6 GL,1.6 GLS,1.6 TD,1.8 CC,1.8 E,1.8 GTE,1.8 S,1.8 SE,1.8 스포츠,1.9 E,1.9 터보 디젤,1.9 터보 디젤 아반트,2.0 E,2.0 L,2.0 스포츠,2.1 콰트로,2.3 E,2.3 콰트로,2.6 B4,2.6 B4 아반트,2.6 콰트로';
cars['아우디->A3'] = '2.0 TFSI';
cars['아우디->A4'] = '1.8 터보,1.8 터보 카브리올레,1.9 터보 디젤,2.0,2.0 TFSI,2.0 TFSI MU,2.0 TFSI 카브리올레,2.0 TFSI 콰트로,2.0 아반트,2.4 카브리올레,2.4 콰트로,2.8 카브리올레,2.8 콰트로,3.0 FSI,3.0 카브리올레,3.0 콰트로';
cars['아우디->A6'] = '1.8 터보,2.0 터보 FSI,2.4,2.4 F,2.4 SE,2.4 콰트로,2.4 콰트로 SE,2.6,2.7 터보 콰트로,2.8 콰트로 스포츠,3.0 TDI,3.0 콰트로,3.2 FSI,3.2 FSI 콰트로,3.2 MU,4.2 콰트로';
cars['아우디->A8'] = '2.8 콰트로,3.0 LWB,3.2 FSI,3.7 콰트로,4.2 콰트로,4.2 콰트로 스포츠,6.0 콰트로 LWB,L 3.0,L 4.2 콰트로';
cars['아우디->Q7'] = '3.0 터보 디젤,3.6 FSI 콰트로,3.6 FSI 프리미엄 콰트로,4.2 FSI,4.2 FSI 콰트로,4.2 FSI 프리미엄 콰트로';
cars['아우디->RS4'] = '4.2 콰트로';
cars['아우디->RS6'] = '4.2';
cars['아우디->S3'] = '1.8 콰트로';
cars['아우디->S4'] = '4.2 아반트,4.2 카브리올레,4.2 콰트로';
cars['아우디->S6'] = '4.2 아반트 콰트로';
cars['아우디->S8'] = 'FSI 콰트로';
cars['아우디->TT'] = '로드스터 1.8T,로드스터 2.0T FSI,쿠페 1.8T,쿠페 2.0T FSI';
cars['아우디->올로드 콰트로'] = '2.5 터보 디젤,2.7 터보';


cars['아큐라'] = 'TSX,RSX,RL,TL,NSX,MDX';
cars['아큐라->TSX'] = '2.4';
cars['아큐라->RSX'] = '2.0,TYPE S';
cars['아큐라->RL'] = '3.5';
cars['아큐라->TL'] = '3.2';
cars['아큐라->NSX'] = 'NSX';
cars['아큐라->MDX'] = '3.5';


cars['알파로메오'] = '156,159,147,브레라,8C';
cars['알파로메오->156'] = '2.0 JTS';
cars['알파로메오->159'] = '1.9 JTDM,2.2 JTS';
cars['알파로메오->147'] = 'GTA';
cars['알파로메오->브레라'] = '3.2 JTS Q4';
cars['알파로메오->8C'] = 'Competizione';


cars['애스톤마틴'] = '뱅퀴시,DB9,V8 빈티지,DBS';
cars['애스톤마틴->뱅퀴시'] = 'S';
cars['애스톤마틴->DB9'] = '로드스터,쿠페';
cars['애스톤마틴->V8 빈티지'] = '쿠페';
cars['애스톤마틴->DBS'] = 'DBS';


cars['이스즈'] = 'I-290,I-370,아센더';
cars['이스즈->I-290'] = 'LS,LUXURY,S';
cars['이스즈->I-370'] = 'CREW CAB LIMITED 2WD,CREW CAB LIMITED 4WD,CREW CAB LS 2WD,CREW CAB LS 4WD,EXTENDED CAB LS 2WD,EXTENDED CAB LS 4WD,EXTENDED CAB LUXURY 2WD,EXTENDED CAB LUXURY 4WD';
cars['이스즈->아센더'] = '2WD 5인승,2WD 7인승,4WD 5인승,4WD 7인승';


cars['인피니티'] = 'FX,G,M,Q';
cars['인피니티->FX'] = '35,45';
cars['인피니티->G'] = '35 세단,35 쿠페,37 쿠페';
cars['인피니티->M'] = '35,45';
cars['인피니티->Q'] = '45';


cars['재규어'] = 'S-타입,X-타입,XJ-타입,XK-타입,다임러,소버린';
cars['재규어->S-타입'] = '2.5,2.7D,3.0,3.0 LUXURY,4.0';
cars['재규어->X-타입'] = '2.1,2.5,3.0';
cars['재규어->XJ-타입'] = '2.7 D,3.0 SWB,3.5 LWB,4.2 LWB,DAIMLER';
cars['재규어->XK-타입'] = '4.2 CONVERTIBLE,4.2 COUPE';
cars['재규어->다임러'] = '4.2 POWER,4.2 SUPERCHARGE';
cars['재규어->소버린'] = 'V8 4.0';


cars['지엠씨'] = '사바나,사파리,유콘 XL 데날리';
cars['지엠씨->사바나'] = '컨버젼 밴';
cars['지엠씨->사파리'] = '4.3';
cars['지엠씨->유콘 XL 데날리'] = '6.0L';


cars['지프'] = '체로키,그랜드 체로키,랭글러,보이저,커멘더';
cars['지프->체로키'] = '2.8 CRD,3.7 LIMITED';
cars['지프->그랜드 체로키'] = '2.7 CRD,4.7 LIMITED,5.2,5.7 HEMI,V6 3.0 CRD';
cars['지프->랭글러'] = '사하라';
cars['지프->보이저'] = '3.0,4.7';
cars['지프->커멘더'] = '3.0 CRD';


cars['캐딜락'] = 'BLS,CTS,CTS-V,DTS,SRX,STS,STS-V,XLR,XLR-V,드빌,세빌,에스컬레이드,컨코어,플리트우드';
cars['캐딜락->BLS'] = '1.9 D 150HP,2.0 T 175HP';
cars['캐딜락->CTS'] = '2.8L,3.2L,3.6L';
cars['캐딜락->CTS-V'] = '6.0L';
cars['캐딜락->DTS'] = '4.6L V8,LIMOUSINE';
cars['캐딜락->SRX'] = '3.6L.4.6L';
cars['캐딜락->STS'] = '3.6L,4.6L';
cars['캐딜락->STS-V'] = '4.4L';
cars['캐딜락->XLR'] = '로드스터,리미티드';
cars['캐딜락->XLR-V'] = '로드스터';
cars['캐딜락->드빌'] = '4.6,DHS,DTS';
cars['캐딜락->세빌'] = 'SLS,STS';
cars['캐딜락->에스컬레이드'] = '2WD,4WD,ESV 4WD,ESV PLATINUM EDITION,EXT 4WD';
cars['캐딜락->컨코어'] = '4.6';
cars['캐딜락->플리트우드'] = '리무진';


cars['코니세그'] = 'CC';
cars['코니세그->CC'] = '8S,R,X';


cars['크라이슬러'] = '300C,300M,LHS,PT 크루저,그랜드 보이저,네온,뉴욕커,보이저,비전,세브링,스트라투스,이글탈론,캐러밴,크로스파이어,퍼시피카';
cars['크라이슬러->300C'] = '3.0,3.5,5.7,DIESEL';
cars['크라이슬러->300M'] = '3.5,SEDAN';
cars['크라이슬러->LHS'] = '3.5';
cars['크라이슬러->PT 크루저'] = '2.4,GT,GT 컨버터블,드림 크루저,리미티드 에디션,투어링 에디션';
cars['크라이슬러->그랜드 보이저'] = '2.5,2.8 CRD,3.3 리미티드';
cars['크라이슬러->네온'] = '2.0I';
cars['크라이슬러->뉴욕커'] = 'V6 3.5';
cars['크라이슬러->보이저'] = '2.4,LX';
cars['크라이슬러->비전'] = 'ESI,TSI';
cars['크라이슬러->세브링'] = 'LX 세단,LXI 세단,LXI 컨버터블,리미티드 컨버터블';
cars['크라이슬러->스트라투스'] = 'NEW 2.0L,NEW 2.5L';
cars['크라이슬러->이글탈론'] = '2.0';
cars['크라이슬러->캐러밴'] = '그랜드 3.3';
cars['크라이슬러->크로스파이어'] = '로드스터,쿠페';
cars['크라이슬러->퍼시피카'] = '3.5';


cars['파가니'] = 'Zonda';
cars['파가니->Zonda'] = 'F,F clubsport,F 로드스터,S,로드스터';


cars['페라리'] = '348,550,575M,599,612,F355,F355 F1,F360,F430,F456 M,엔초';
cars['페라리->348'] = 'TS,스파이더';
cars['페라리->550'] = 'GTO,마라넬로,바르케타';
cars['페라리->575M'] = '마라넬로';
cars['페라리->599'] = 'GTB 피오라노';
cars['페라리->612'] = '스카글리에티';
cars['페라리->F355'] = 'GTS,베를리네타,스파이더';
cars['페라리->F355 F1'] = '스파이더';
cars['페라리->F360'] = '모데나,스파이더,첼린지';
cars['페라리->F430'] = '모데나,스파이더,하만 블랙 미라클';
cars['페라리->F456 M'] = 'GT,GTA';
cars['페라리->엔초'] = '6.0 V12';


cars['포드'] = '머스탱,몬데오,브론코,썬더버드,윈드스타,이스케이프,이코노라인,익스큐젼,익스플로러,익스플로러 스포츠,익스플로러 스포츠 트랙,토러스,파이브 헌드레드,프리스타,프리스타일';
cars['포드->머스탱'] = 'GT CAL 스페셜 패키지,GT 디럭스,GT 디럭스 컨버터블,GT 프리미엄,GT 프리미엄 컨버터블,V6 디럭스,V6 디럭스 컨버터블,V6 포니 패키지,V6 프리미엄,V6 프리미엄 컨버터블,쉘비 GT 500,쉘비 GT 500 컨버터블';
cars['포드->몬데오'] = 'ESTATE,I4 2.0,S4 2.0,ST,V6 2.5';
cars['포드->브론코'] = '4.9,EDDIE BAUER,XL,XLT,커스텀';
cars['포드->썬더버드'] = '50TH 애니버서리,디럭스,프리미엄';
cars['포드->윈드스타'] = '3.8L,GL,LX,LX 디럭스,LX 스탠다드,SE,SE 스포츠,SEL,리미티드,카고 밴';
cars['포드->이스케이프'] = 'XLS 2WD,XLS 4WD,XLS 4WD AT,XLS FWD AT,XLS FWD 매뉴얼,XLT 2WD,XLT 2WD 2.3,XLT 2WD 스포츠,XLT 4WD,XLT 4WD 2.3,XLT 4WD I4,XLT 4WD V6,XLT 4WD 스포츠,XLT FWD I4,XLT FWD V6,리미티드 4WD,리미티드 FWD,리미티드 FWD AT,리미티드 FWD I4,리미티드 FWD V6,리미티드 FWD 매뉴얼';
cars['포드->이코노라인'] = 'E150,E250,E250 HD,E250 HD 슈퍼,E250 슈퍼,E250 익스텐디드,E350 슈퍼,E350 슈퍼 듀티,E350 슈퍼 듀티 익스텐디드';
cars['포드->익스큐젼'] = 'XLS 5.4L 2WD,XLS 5.4L 4WD,XLS 6.0L 2WD,XLS 6.0L 4WD,XLS 6.8L 2WD,XLS 6.8L 4WD,XLT 5.4L 2WD,XLT 5.4L 4WD,XLT 6.0L 2WD,XLT 6.0L 4WD,XLT 6.8L 2WD,XLT 6.8L 4WD,리미티드 5.4L 2WD,리미티드 6.0L 2WD,리미티드 6.0L 4WD,리미티드 6.8L 2WD,리미티드 6.8L 4WD,에디 바우어 5.4L 2WD,에디 바우어 6.0L 2WD,에디 바우어 6.0L 4WD,에디 바우어 6.8L 2WD,에디 바우어 6.8L 4WD';
cars['포드->익스플로러'] = 'XLS 2WD,XLS 4.0L 2WD,XLS 4.0L 4WD,XLS 4.0L AWD,XLS 4WD,XLS 스포츠 4.0L 2WD,XLS 스포츠 4.0L 4WD,XLS 스포츠 4.0L AWD,XLT 2WD,XLT 4.0L 2WD,XLT 4.0L 4WD,XLT 4.0L AWD,XLT 4.6L 2WD,XLT 4.6L 4WD,XLT 4.6L AWD,XLT 4WD,XLT AWD,XLT 스포츠 4.0L 2WD,XLT 스포츠 4.0L 4WD,XLT 스포츠 4.0L AWD,XLT 스포츠 4.6L 2WD,XLT 스포츠 4.6L 4WD,XLT 스포츠 4.6L AWD,리미티드 2WD,리미티드 4.0L 2WD,리미티드 4.0L 4WD,리미티드 4.0L AWD,리미티드 4.6L 2WD,리미티드 4.6L 4WD,리미티드 4.6L AWD,리미티드 4WD,리미티드 AWD,스포츠 2WD,스포츠 4WD,에디 바우어 2WD,에디 바우어 4.0L 2WD,에디 바우어 4.0L 4WD,에디 바우어 4.0L AWD,에디 바우어 4.6L 2WD,에디 바우어 4.6L 4WD,에디 바우어 4.6L AWD,에디 바우어 4WD,에디 바우어 AWD';
cars['포드->익스플로러 스포츠'] = '4X2 XLS,4X2 XLS 오토매틱,4X2 XLT,4X2 XLT 프리미엄,4X4 XLS,4X4 XLS 오토매틱,4X4 XLT,4X4 XLT 프리미엄';
cars['포드->익스플로러 스포츠 트랙'] = '2WD,2WD 밸류,2WD 밸류-110A,2WD 초이스,2WD 프리미엄,4WD,4WD 밸류,4WD 밸류-210A,4WD 초이스,4WD 프리미엄,XLS 2WD,XLS 4WD,XLS 4WD 오토매틱,XLT 2WD,XLT 4.0L 2WD,XLT 4.0L 4WD,XLT 4.6L 2WD,XLT 4.6L 4WD,XLT 4WD,XLT 프리미엄 2WD,XLT 프리미엄 4WD,리미티드 4.0L 2WD,리미티드 4.0L 4WD,리미티드 4.6L 2WD,리미티드 4.6L 4WD,아드레날린 2WD,아드레날린 4WD';
cars['포드->토러스'] = 'GL,LX,SE,SEL,SEL AWD,SHO,리미티드,리미티드 AWD';
cars['포드->파이브 헌드레드'] = 'SE,SE AWD,SEL AWD,SEL FWD,리미티드,리미티드 AWD,리미티드 FWD';
cars['포드->프리스타'] = '3.8L,LX,LX 스포츠,S,SE,SEL,SES,리미티드,카고 밴';
cars['포드->프리스타일'] = 'SE AWD,SEL AWD,SEL FWD,리미티드 AWD,리미티드 FWD';


cars['포르쉐'] = '911,968,993,996,997,박스터,박스터 S,카이맨,카이엔';
cars['포르쉐->911'] = 'GT2,GT3,SC,카레라,카레라 2,카레라 4,카레라 4S,카레라 S,터보';
cars['포르쉐->968'] = '쿠페';
cars['포르쉐->993'] = '카레라 4S,카레라 GT2,카레라 RS,카레라 S,타가,터보,터보 S';
cars['포르쉐->996'] = '터보';
cars['포르쉐->997'] = '카레라 4S 카브리올레,카레라 S,터보 3.6';
cars['포르쉐->박스터'] = '2.5,2.7';
cars['포르쉐->박스터 S'] = '3.4';
cars['포르쉐->카이맨'] = '2.7,S';
cars['포르쉐->카이엔'] = '3.2,3.4,3.6,S,터보';


cars['폭스바겐'] = '골프,비틀,뉴비틀,보라,이오스,제타,투아렉,파샤트,파샤트 바리안트,페이톤';
cars['폭스바겐->골프'] = '1.4 FSI DLX,1.4 FSI STD,1.6 FSI DLX,1.6 FSI STD,1.8T GTI,1.9 TDI,1.9 TDI DLX,1.9 TDI STD,2.0 FSI DLX,2.0 FSI STD,2.0 GTI,2.0 GTI 화렌하이트,2.0 PREMIUM,2.0 TDI DLX,2.0 TDI DSG,2.0 TDI STD,2.8 VR6,GL 1.8,GL 1.8 바리언트,GL 1.8 카브리올레,GL 2.0';
cars['폭스바겐->비틀'] = 'CLASSIC,GLS,STD,SUPER';
cars['폭스바겐->뉴비틀'] = 'DELUXE 2.0,GL 2.0 L,GLS 1.8 T,GLS 1.9 L TDI,GLS 2.0 L,GLX 1.8 T,카브리올레 2.0';
cars['폭스바겐->보라'] = '2.0 I';
cars['폭스바겐->이오스'] = '2.0';
cars['폭스바겐->제타'] = '2.0 GL,2.0 GL TDI,2.0 GLS,2.0 GLS TDI,2.0 PRM,2.0 TDI CFT,2.0 TDI PRM,2.0 TFSI,2.5 CFT,2.5 PRM';
cars['폭스바겐->투아렉'] = 'V10 TDI 인디비주얼,V6 3.0 TDI,V6 3.2,V6 3.6 4MOTION,V8 4.2';
cars['폭스바겐->파샤트'] = '1.8 5V TURBO,1.8T GLS,2.0 FSI,2.0 FSI 프리미엄,2.0 GL,2.0 TDI,2.0 TDI 스포츠,2.0 TDI 프리미엄,2.0 TFSI,2.8 GLS V6,2.8 GLS V6 4MOTION,2.8 GLX V6,2.8 GLX V6 4MOTION';
cars['폭스바겐->파샤트 바리안트'] = '2.0 FSI,2.0 TDI,2.0 TDI SPORT,2.0 TFSI';
cars['폭스바겐->페이톤'] = 'V6 3.0 TDI NWB,V6 3.2 LWB,V6 3.2 NWB,V8 4.2 LWB,W12 6.0 LWB EXECUTIVE';


cars['폰티악'] = '그랜드 앰,파이어버드';
cars['폰티악->그랜드 앰'] = '2.3L,2.4L';
cars['폰티악->파이어버드'] = '2DR 쿠페';


cars['푸조'] = '206,206CC,206RC,206SW,207CC,207GT,207RC,306,307,307CC,307SW,405,406,407,407SW,605,607,807';
cars['푸조->206'] = '1.1,1.4,1.4 HDI,1.6,1.6 HDI,2.0';
cars['푸조->206CC'] = 'RC 라인,록시,롤랑 갸로,퀵실버,클래식';
cars['푸조->206RC'] = '2.0';
cars['푸조->206SW'] = '1.6';
cars['푸조->207CC'] = '1.6';
cars['푸조->207GT'] = '1.6';
cars['푸조->207RC'] = '1.6';
cars['푸조->306'] = 'ST,XL,XN';
cars['푸조->307'] = '2.0 HDI';
cars['푸조->307CC'] = '스포츠,클래식';
cars['푸조->307SW'] = '2.0 HDI';
cars['푸조->405'] = 'GL,GLX,GR,MI 16,T-16,왜건';
cars['푸조->406'] = 'ST 2.0,ST 2.2,ST 3.0,SV 1.8';
cars['푸조->407'] = '2.0,2.0 HDI,2.0 HDI PREMIUM,2.0 HDI PREMIUM NAVI,2.0 HDI SPORTS,2.2,2.7,2.7 HDI,2.9';
cars['푸조->407SW'] = '2.0,2.0 HDI';
cars['푸조->605'] = 'SR,SRI,SV';
cars['푸조->607'] = '2.0 HDI,2.2,2.2 HDI,2.7,2.7 HDI,3.0';
cars['푸조->807'] = '2.0,2.0 HDI,2.2,2.2 HDI';


cars['피아트'] = '바르게타,쿠페,푼토';
cars['피아트->바르게타'] = '1.8';
cars['피아트->쿠페'] = '2.0 16V DOHC';
cars['피아트->푼토'] = '1.2 3DR,1.8 16V';


cars['허머'] = 'H1,H2,H3';
cars['허머->H1'] = '6.5';
cars['허머->H2'] = '6.0';
cars['허머->H3'] = '3.5,3.7';


cars['혼다'] = 'BEAT,CR-V,CR-X,FR-V,HR-V,NSX,S2000,레젼드,릿지라인,스트림,시빅,어코드,어큐라,엘리먼트,오딧세이,파일럿,피트';
cars['혼다->BEAT'] = '0.6';
cars['혼다->CR-V'] = '2WD EX 2.0,2WD EX 2.4,2WD EX-L 2.0,2WD EX-L 2.4,2WD LX 2.0,2WD LX 2.4,4WD EX 2.0,4WD EX 2.4,4WD EX-L 2.0,4WD EX-L 2.4,4WD LX 2.0,4WD LX 2.4';
cars['혼다->CR-X'] = '델솔 S,델솔 SI,델솔 VTEC';
cars['혼다->FR-V'] = '1.7 I VTEC,2.0 I-VTEC,2.2 I-CTDI';
cars['혼다->HR-V'] = '1.5';
cars['혼다->NSX'] = '3.0,3.2';
cars['혼다->S2000'] = '2.2';
cars['혼다->레젼드'] = 'V6 3.5';
cars['혼다->릿지라인'] = 'RT,RTL,RTS,RTX';
cars['혼다->스트림'] = '2.0';
cars['혼다->시빅'] = 'GX NGV 1.8,세단 DX 1.8,세단 EX 1.8,세단 LX 1.8,세단 SI 2.0,쿠페 DX 1.8,쿠페 EX 1.8,쿠페 LX 1.8,쿠페 SI 2.0,하이브리드 1.3';
cars['혼다->어코드'] = '세단 2.4 EX,세단 2.4 LX,세단 2.4 VP,세단 3.0 EX,세단 3.0 LX,세단 EX-L V-6 3.0,세단 EX-L V-6 6MT 3.0,세단 LX V-6 3.0,세단 SE V-6 3.0,세단 밸류패키지 2.4,세단 스페셜 에디션 2.4,쿠페 EX 2.4,쿠페 EX 3.0,쿠페 EX-L V-6 3.0,쿠페 EX-L V-6 6MT 3.0,쿠페 LX 2.4,쿠페 LX 3.0,쿠페 LX V-6 3.0,하이브리드 V6 3.0';
cars['혼다->어큐라'] = '2.2 CL,3.2 CL,3.2 TL,CSX 2.0,MDX,RDX,RL A-SPEC,RSX';
cars['혼다->엘리먼트'] = 'EX 2WD,EX 4WD,EX-P 2WD,EX-P 4WD,LX 2WD,LX 4WD,SC';
cars['혼다->오딧세이'] = 'EX,EX-L,LX,TOURING';
cars['혼다->파일럿'] = '2WD EX,2WD LX,4WD EX,4WD LX';
cars['혼다->피트'] = '1.5,스포츠';


cars['홀덴'] = 'Barina,Viva,Astra,Vectra,Statsman,Tigra';
cars['홀덴->Barina'] = '세단';
cars['홀덴->Viva'] = '세단';
cars['홀덴->Astra'] = '컨버터블,쿠페';
cars['홀덴->Vectra'] = '세단';
cars['홀덴->Statsman'] = 'V6,V8';
cars['홀덴->Tigra'] = '컨버터블';



											
    function wr_8change() 
    {
        var f = document.fwrite;

        wr_9view(f.wr_8.value);
        wr_10view(f.wr_8.value, f.wr_9.value);
    }

    function wr_9change() 
    {
        var f = document.fwrite;

        wr_10view(f.wr_8.value, f.wr_9.value);
    }

    function wr_10view(wr_8, wr_9)
    {
        var f = document.fwrite;

        f.wr_10.options.length = 1;
        f.wr_10.options[0].text = "등급(전체)";
        f.wr_10.options[0].selected = true;
        if (!wr_8 || !wr_9) {
            return;
        }

        car = cars[wr_8+"->"+wr_9].split(",");
        f.wr_10.options.length = car.length+1;
        for (i=0; i<car.length; i++) {
            f.wr_10.options[i+1].value = car[i];
            f.wr_10.options[i+1].text = car[i];
        }
    }

    function wr_9view(wr_8)
    {
        var f = document.fwrite;

        f.wr_9.options.length = 1;
        f.wr_9.options[0].text = "모델(전체)";
        f.wr_9.options[0].selected = true;
        if (!wr_8) {
            return;
        }

        car = cars[wr_8].split(",");
        f.wr_9.options.length = car.length+1;
        for (i=0; i<car.length; i++) {
            f.wr_9.options[i+1].value = car[i];
            f.wr_9.options[i+1].text = car[i];
        }
    }

    function wr_8view()
    {
        var f = document.fwrite;

        f.wr_8.options.length = 1;
        f.wr_8.options[0].text = "브랜드(전체)";
        car = cars["제조사"].split(",");
        f.wr_8.options.length = car.length+1;
        for (i=0; i<car.length; i++) {
            f.wr_8.options[i+1].value = car[i];
            f.wr_8.options[i+1].text = car[i];
        }
    }
