package com.example.chanolja_core_api.user.model.entity;

import com.example.chanolja_core_api.user.model.dto.LoginHstDto;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import lombok.*;

@Entity
@Table(name="tbl_login_hst")
@NoArgsConstructor @AllArgsConstructor
@Getter @Setter @ToString @Builder
public class LoginHstEntity {

    @Id
    private LoginHstPK loginhst_id;
    @Column(name="user_os", length = 32)
    private String user_os; // 사용자 os
    @Column(name="user_ip", length = 32)
    private String user_ip; // 사용자 ip
    @Column(name="user_language", length = 32)
    private String user_language; // 사용자 언어
    @Column(name="user_browser", length = 32)
    private String user_browser; // 사용자 브라우저
    @Column(name="web_width")
    private int web_width; // 웹 브라우저 가로크기
    @Column(name="web_height")
    private int web_height; // 웹 브라우저 세로크기



    public LoginHstDto toLoginHstDto() {
        return LoginHstDto.builder()
                .login_datetime(this.loginhst_id.getLogin_datetime())
                .user_os(this.user_os)
                .user_seq(this.loginhst_id.getUser_seq())
                .user_ip(this.user_ip)
                .user_language(this.user_language)
                .user_browser(this.user_browser)
                .web_width(this.web_width)
                .web_height(this.web_height)
                .build();
    }

}
