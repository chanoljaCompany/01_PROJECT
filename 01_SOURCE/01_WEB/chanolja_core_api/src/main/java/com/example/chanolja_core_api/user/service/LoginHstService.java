package com.example.chanolja_core_api.user.service;

import com.example.chanolja_core_api.user.model.dto.LoginHstDto;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;

@Service
public class LoginHstService {

    public boolean loginhstPost(LoginHstDto loginHstDto) {

        return false;
    }

    public LoginHstDto loginhstGet(LoginHstDto loginHstDto) {
        LoginHstDto result;
        return result;
    }

    public boolean loginhstPut(LoginHstDto loginHstDto) {

        return false;
    }

    public boolean loginhstDelete(String login_datetime, String user_seq) {

        return false;
    }
}
