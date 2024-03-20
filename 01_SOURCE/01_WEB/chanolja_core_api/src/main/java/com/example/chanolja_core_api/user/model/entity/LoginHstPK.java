package com.example.chanolja_core_api.user.model.entity;


import jakarta.persistence.Embeddable;
import lombok.*;

import java.io.Serializable;

@Embeddable
@Getter @Setter @NoArgsConstructor @AllArgsConstructor
@EqualsAndHashCode // equals와 hashCode 메소드를 자동 생성해줌
public class LoginHstPK implements Serializable {
    private String login_datetime;
    private String user_seq;
}
