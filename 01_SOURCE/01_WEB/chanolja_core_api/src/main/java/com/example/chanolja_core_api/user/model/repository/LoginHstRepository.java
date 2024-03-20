package com.example.chanolja_core_api.user.model.repository;

import com.example.chanolja_core_api.user.model.entity.LoginHstEntity;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface LoginHstRepository extends JpaRepository<LoginHstEntity, String> {

}
