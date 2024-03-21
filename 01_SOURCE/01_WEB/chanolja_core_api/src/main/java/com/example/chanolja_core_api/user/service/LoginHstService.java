package com.example.chanolja_core_api.user.service;

import com.example.chanolja_core_api.user.model.dto.LoginHstDto;
import com.example.chanolja_core_api.user.model.entity.LoginHstEntity;
import com.example.chanolja_core_api.user.model.repository.LoginHstRepository;
import jakarta.transaction.Transactional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;

import java.util.ArrayList;
import java.util.List;

@Service
public class LoginHstService {

    @Autowired
    private LoginHstRepository loginHstRepository;

    @Transactional
    public boolean loginhstPost(LoginHstDto loginHstDto) {

        LoginHstEntity loginHstEntity = loginHstDto.toLoginHstEntity();

        LoginHstEntity result = loginHstRepository.save(loginHstEntity);

        return result.getLoginhst_id() != null;
    }

    @Transactional
    public List<LoginHstDto> loginhstGet() {

        List<LoginHstDto> result = new ArrayList<>();
        List<LoginHstEntity> list = loginHstRepository.findAll();

        for(LoginHstEntity loginHstEntity : list) {
            result.add(loginHstEntity.toLoginHstDto());
        }

        return result;
    }

    @Transactional
    public boolean loginhstPut(LoginHstDto loginHstDto) {

        return false;
    }

    @Transactional
    public boolean loginhstDelete(String login_datetime, String user_seq) {

        return false;
    }
}
