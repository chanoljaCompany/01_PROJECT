package com.example.chanolja_core_api.user.model.dto;

import com.example.chanolja_core_api.user.model.entity.LoginHstEntity;
import lombok.*;

@NoArgsConstructor @AllArgsConstructor
@Getter @Setter @ToString @Builder
public class LoginHstDto {
    private String login_datetime; // 컬럼 생성시간
    private String user_seq; // 사용자 식별번호
    private String user_os; // 사용자 os
    private String user_ip; // 사용자 ip
    private String user_language; // 사용자 언어
    private String user_browser; // 사용자 브라우저
    private int web_width; // 웹 브라우저 가로크기
    private int web_height; // 웹 브라우저 세로크기

    public LoginHstEntity toLoginHstEntity(){
        return LoginHstEntity.builder()
                .login_datetime(this.login_datetime)
                .user_seq(this.user_seq)
                .user_ip(this.user_ip)
                .user_browser(this.user_browser)
                .user_language(this.user_language)
                .user_os(this.user_os)
                .web_height(this.web_height)
                .web_width(this.web_width)
                .build();
    }
}
