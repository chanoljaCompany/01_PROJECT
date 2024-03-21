package com.example.chanolja_core_api.user.controller;

import com.example.chanolja_core_api.user.model.dto.LoginHstDto;
import com.example.chanolja_core_api.user.service.LoginHstService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/login_hst")
public class LoginHstController {

    @Autowired
    LoginHstService loginHstService;

    // 로그인 로그 등록
    @PostMapping("/post")
    public boolean loginhstPost(@RequestBody LoginHstDto loginHstDto) {
        boolean result = loginHstService.loginhstPost(loginHstDto);
        return result;
    }

    // 로그인 로그 전체 읽기
    @GetMapping("/get")
    public List<LoginHstDto> loginhstGet() {
        List<LoginHstDto> result = loginHstService.loginhstGet();
        return result;
    }

    // 로그인 로그 수정
    @PutMapping("/put")
    public boolean loginhstPut(@RequestBody LoginHstDto loginHstDto) {
        boolean result = loginHstService.loginhstPut(loginHstDto);
        return result;
    }

    // 로그인 로그 삭제
    @DeleteMapping("/delete")
    public boolean loginhstDelete(@RequestParam String login_datetime, @RequestParam String user_seq) {
        boolean result = loginHstService.loginhstDelete(login_datetime, user_seq);
        return result;
    }
}
